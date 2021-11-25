<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Comentario;
use App\Models\Proveedor\Solicitud;
use App\Models\Proveedor\SolicitudRequisito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::where('estatus', '=', 'En revisión')->orderBy('created_at', 'desc')->paginate();

        return view('admin.solicituds', compact('solicitudes'));
    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        return view('admin.show_solicitud', compact(['solicitud']));
    }

    public function aceptar($id)
    {
        // Modificar el estatus de la solicitud al ser aceptada
        $solicitud = Solicitud::find($id);
        $solicitud->estatus = 'Aceptada';
        $solicitud->save();

        return redirect()->route('admin.solicitudes');
    }

    public function rechazar(Request $request)
    {
        $rules = [
            'comentario' => 'required',
            'solicitud_id' => 'required',
            'tipo_rechazo' => 'required'
        ];

        $messages = [
            'comentario.required' => 'El comentario es necesario',
            'solicitud_id.required' => 'Solicitud requerida',
            'tipo_rechazo.required' => 'Seleccione el tipo de rechazo',
        ];

        $request->validate($rules, $messages);

        // Modificar el estatus de la solicitud al ser rechazada
        $solicitud_id = $request->solicitud_id;
        $solicitud = Solicitud::find($solicitud_id);
        $solicitud->estatus = $request->tipo_rechazo;
        $solicitud->save();

        // Se guarda el comentario con los campos [comentario, solicitud_id]
        Comentario::create($request->all());
        // En caso de un rechazo definitivo, eliminar los documentos almacenados en storage
        if ($request->tipo_rechazo == 'Rechazada') {
            // Eliminar documentos
            $this->definitivo($solicitud_id);
        }
        return redirect()->intended(route('admin.solicitudes'));
    }

    private function definitivo($solicitud_id)
    {
        $solicitud_requisitos = SolicitudRequisito::where('solicitud_id', '=', $solicitud_id)->get();
        foreach ($solicitud_requisitos as $solicitud_requisito) {
            $path = 'public\\' . $solicitud_requisito->ruta;
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }
        SolicitudRequisito::where('solicitud_id', '=', $solicitud_id)->delete();
    }

    public function openDocument(SolicitudRequisito $solicitudRequisito)
    {
        $storage = Storage::path('public\\' . $solicitudRequisito->ruta);

        return response()->file($storage);
    }
}
