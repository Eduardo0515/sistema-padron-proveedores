<?php

namespace App\Http\Controllers\Proveedor;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Requisito;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\File;
use App\Models\Proveedor\Giro;
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
        $solicitudes = Solicitud::where('user_proveedor_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate();

        return view('proveedors.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        $giros = Giro::all();
        return view('proveedors.solicitudes.create_info', compact('giros'));
    }

    public function edit(Solicitud $solicitud)
    {
        if (trim($solicitud->estatus) == 'Para corrección') {
            $giros = Giro::all();
            return view('proveedors.solicitudes.edit_info', compact('solicitud', 'giros'));
        } else {
            return redirect()->route('solicitud.index');
        }
    }

    public function createDocs($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        // Validar que se puedan actualizar los documentos solo cuando el estatus de la solicitud sea [En captura]
        if (trim($solicitud->estatus) == 'En captura') {
            $requisitos = Requisito::all();
            return view('proveedors.solicitudes.create', compact('requisitos', 'solicitud'));
        } else {
            return redirect()->route('solicitud.index');
        }
    }

    public function editDocs(Solicitud $solicitud)
    {
        // Únicamente se podrá editar los documentos de la solicitud que tenga estatus [Para corrección] 
        if (trim($solicitud->estatus) == 'Para corrección') {
            $solicitudRequisitos = $solicitud->solicitudRequisitos;
            $requisitos = Requisito::all();
            foreach ($requisitos as $requisito) {
                $requisito->docExists = false;
                // Se verifica si ya existe un documento subido para cada requisito
                foreach ($solicitudRequisitos as $solicitudRequisito) {
                    // Si hay documento previo, se pasa la bandera [docExists] a true y también se guarda el id de [solicitudRequisito]
                    if ($requisito->id == $solicitudRequisito->requisito_id) {
                        $requisito->docExists = true;
                        $requisito->solicitudReqId = $solicitudRequisito->id;
                    }
                }
            }
            return view('proveedors.solicitudes.edit_docs', compact('solicitud', 'requisitos'));
        } else {
            return redirect()->route('solicitud.index');
        }
    }

    public function validateSolicitud(Request $request)
    {
        $messages = [
            "rfc.required" => "RFC Obligatorio",
            "giros.required" => "Seleccione al menos una opción",
        ];
        $validator = Validator::make($request->all(), [
            'telefono' => ['required', 'max:45'],
            'extension' => ['max:45'],
            'nombres' => ['required', 'max:255'],
            'apellidos' => ['required', 'max:255'],
            'capital_contable' => ['required', 'max:255'],
            'giros' => ['required'],
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
            // Se agregan los giros de la empresa
            $solicitud->giros()->attach($request->giros);
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
            $nuevaSolicitud = $request->all();
            // Con [unset] se eliminan las variables que no son modificables, esto en caso de que se agreguen 
            // otros datos desde la vista o si logran modificar el [$request]
            unset(
                $nuevaSolicitud['rfc'],
                $nuevaSolicitud['user_proveedor_id'],
                $nuevaSolicitud['correo'],
                $nuevaSolicitud['tipo_persona'],
                $nuevaSolicitud['razon_social']
            );
            $solicitud->update($nuevaSolicitud);
            $solicitud->giros()->sync($request->giros);
            return redirect()->route('solicitud.show', $solicitud->id);
        }
    }

    public function updateDocs(Request $request, Solicitud $solicitud)
    {
        $requisitos = Requisito::all();
        $messages = ['mimes' => 'El documento :attribute debe ser de tipo PDF.'];
        $rules = [];
        $attributes = [];
        // Se recorren los requisitos para agregar reglas de validación
        foreach ($requisitos as $requisito) {
            // Solo si se ha subido un documento en el [$request] será validado para que sea de tipo PDF
            if ($request->hasFile('doc' . $requisito->id)) {
                $docId = 'doc' . $requisito->id;
                $rules = Arr::add($rules, $docId, 'mimes:pdf');
                $attributes = Arr::add($attributes, $docId, $requisito->nombre);
            }
        }
        // Se verifica si se ha realizado algún cambio con los documentos, para validar y actualizar,
        // en caso contrario, se reenvía a la vista con un mensaje de que no se ha modificado
        if (count($rules) > 0) {
            $request->validate($rules, $messages, $attributes);

            foreach ($requisitos as $requisito) {
                if ($request->hasFile('doc' . $requisito->id)) {
                    // Se almaena el documento que viene del [$request], el nombre será el mismo que el subido anteriormente
                    // esto hará que el documento anterior sea reemplazado por el nuevo en el storage. 
                    $ruta = $request['doc' . $requisito->id]->storeAs(
                        'solicitud-documentos',
                        $solicitud->id . '-' . $requisito->id,
                        'public'
                    );
                    // Si hay un documento que no se había subido previamente, se creará el registro correspondiente
                    // en la base de datos, de otro modo, solo se actualizará
                    SolicitudRequisito::updateOrCreate(
                        ['requisito_id' => $requisito->id, 'solicitud_id' => $solicitud->id],
                        ['nombre' => $requisito->nombre, 'ruta' => $ruta]
                    );
                }
            }
            return redirect()->route('solicitud.show', $solicitud->id);
        } else {
            return back()->with('no-update', 'No ha realizado ninguna modificación.');
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

    public function cambiarEstatus(Solicitud $solicitud)
    {
        $solicitud->estatus = 'En revisión';
        $solicitud->save();

        return redirect()->route('solicitud.show', $solicitud->id);
    }

    public function pago($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        // Al realizar el pago, se copian todos los datos de la [solicitud] a la tabla de [padron] 
        $padron = Padron::create($solicitud->toArray());
        // Se mueven los documentos de la carpeta [solicitud-documentos] a [proveedor-documentos]
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
        // También se pasa de giros de la solicitud a giros del padrón
        $padron->giros()->attach($solicitud->giros);
        // En este punto termina el proceso de la solicitud, por lo que será eliminada
        $solicitud->delete();
        return redirect()->route('solicitud.mensaje');
    }
}
