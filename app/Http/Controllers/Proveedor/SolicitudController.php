<?php

namespace App\Http\Controllers\Proveedor;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Requisito;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\File;
use App\Models\Proveedor\Padron;
use App\Models\Proveedor\PadronRequisito;
use App\Models\Proveedor\Solicitud;
use App\Models\Proveedor\SolicitudRequisito;
use App\UserProveedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::where('user_proveedor_id', '=', Auth::user()->id)->paginate();

        return view('proveedors.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        return view('proveedors.solicitudes.create_info');
    }

    public function edit(Solicitud $solicitud)
    {
        return view('proveedors.solicitudes.edit_info', compact('solicitud'));
    }

    public function createDocs($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        if (trim($solicitud->estatus) == 'En captura') {
            $requisitos = Requisito::all();
            return view('proveedors.solicitudes.create', compact('requisitos', 'solicitud'));
        } else {
            return redirect()->route('solicitud.index');
        }
    }

    public function validateSolicitud(Request $request)
    {
        $messages = [
            "rfc.required" => "RFC Obligatorio",
        ];
        $validator = Validator::make($request->all(), [
            'telefono' => ['required', 'max:45'],
            'extension' => ['max:45'],
            'nombres' => ['required', 'max:255'],
            'apellidos' => ['required', 'max:255'],
            'capital_contable' => ['required', 'max:255'],
            'domicilio' => ['required', 'max:255'],
            'num_exterior' => ['required', 'max:45'],
            'num_interior' => ['max:45'],
            'colonia' => ['required', 'max:255'],
            'localidad' => ['required', 'max:255'],
            'ciudad' => ['required', 'max:255'],
            'entidad' => ['required', 'max:255'],
            'pais' => ['required', 'max:255'],
            'codigo_postal' => ['required', 'max:45'],
            'latitud' => ['required'],
            'longitud' => ['required'],
        ], $messages);
        return $validator;
    }

    public function store(Request $request)
    {
        $validator = $this->validateSolicitud($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $datosUsuario = [
                'estatus' => 'En captura', 'user_proveedor_id' => Auth::user()->id,
                'rfc' => Auth::user()->rfc, 'correo' => Auth::user()->correo,
                'tipo_persona' => Auth::user()->tipoPersona->tipo_persona,
                'razon_social' => Auth::user()->razon_social
            ];
            $request->merge($datosUsuario);
            $solicitud = Solicitud::create($request->all());
            return redirect()->route('solicitud.createDocs', $solicitud->id);
        }
    }

    public function storeDocs(Request $request)
    {
        $requisitos = Requisito::all();
        $messages = [
            'required' => 'El documento :attribute es obligatorio.',
            'mimes' => 'El documento :attribute debe ser de tipo PDF.'
        ];
        $rules = [];
        $attributes = [];
        foreach ($requisitos as $requisito) {
            $docId = 'doc' . $requisito->id;
            if ($requisito->requerido == 1) {
                // Si el documento es requerido, se aplica una regla de validación de requerido.
                $rules = Arr::add($rules, $docId, 'required|mimes:pdf');
            }
            // Todos los documentos tendrán la validación de tipo PDF.
            $rules = Arr::add($rules, $docId, 'mimes:pdf');
            // Se agregan los atributos personalizados de acuerdo a los nombres de los documentos.
            $attributes = Arr::add($attributes, $docId, $requisito->nombre);
        }

        $request->validate($rules, $messages, $attributes);

        foreach ($requisitos as $requisito) {
            if ($request->hasFile('doc' . $requisito->id)) {
                // El nombre del documento será el [ID solicitud] + [-] + [ID requisito]
                $name = $request->solicitud_id . '-' . $requisito->id;
                // La ruta en que se almacenará el documento será [storage/app/public/solicitud-documentos/nombre_documento]
                $path = $request['doc' . $requisito->id]->storeAs('solicitud-documentos', $name, 'public');

                // Se almacena el nombre y la ruta del documento con el [id] de la solicitud
                SolicitudRequisito::create([
                    'nombre' => $requisito->nombre,
                    'ruta' => $path,
                    'requisito_id' => $requisito->id,
                    'solicitud_id' => $request->solicitud_id
                ]);
            }
        }

        $solicitud = Solicitud::find($request->solicitud_id);
        $solicitud->estatus = 'En revisión';
        $solicitud->save();

        return redirect()->route('solicitud.index');
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $validator = $this->validateSolicitud($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            //$request['estatus'] = 'Para corrección';
            $nuevaSolicitud = $request->all();
            unset(
                $nuevaSolicitud['rfc'],
                $nuevaSolicitud['user_proveedor_id'],
                $nuevaSolicitud['correo'],
                $nuevaSolicitud['tipo_persona'],
                $nuevaSolicitud['razon_social'],
            );
            $solicitud->update($nuevaSolicitud);
            /*
            $request->merge($datosUsuario);
            $solicitud = Solicitud::create($request->all());
            return redirect()->route('solicitud.createDocs', $solicitud->id);*/
            return $solicitud;
        }
    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        return view('proveedors.solicitudes.show', compact(['solicitud']));
    }

    public function openDocument($id)
    {
        $solicitudRequisito = SolicitudRequisito::find($id);
        $storage = Storage::path('public\\' . $solicitudRequisito->ruta);

        return response()->file($storage);
    }

    public function pago($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        $padron = Padron::create($solicitud->toArray());
        foreach ($solicitud->solicitudRequisitos as $solicitudRequisito) {
            $name = $padron->id . '-' . $solicitudRequisito->requisito_id;
            $oldPath = 'public/' . $solicitudRequisito->ruta;
            $newPath = 'public/proveedor-documentos/' . $name;
            if (Storage::exists($oldPath)) {
                Storage::move($oldPath, $newPath);
            }
            PadronRequisito::create([
                'nombre' => $solicitudRequisito->nombre,
                'ruta' => $newPath,
                'requisito_id' => $solicitudRequisito->requisito_id,
                'padron_id' => $padron->id
            ]);
        }
        $solicitud->delete();
        return redirect()->route('solicitud.mensaje');
    }
}
