<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Padron;
use App\Models\Proveedor\PadronRequisito;
use App\Models\Proveedor\SolicitudRequisito;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPadronController extends Controller
{
    public function index()
    {
        $padrons = Padron::orderBy('created_at', 'desc')->paginate();

        return view('admin.padron', compact('padrons'));
    }

    public function show(Padron $padron)
    {
        return view('admin.show_padron', compact(['padron']));
    }

    public function vistaPrevia(Padron $padron)
    {
        $infoCredencial = null;
        return view('admin.credencial.credencial', compact('padron', 'infoCredencial'));
    }

    public function generarCredencial(Request $request, Padron $padron)
    {
        $rules = [
            'giros' => 'required',
            'num_proveedor' => 'required',
            'vigencia' => 'required'
        ];

        $messages = [
            'giros.required' => 'Es necesario ingresar los giros',
            'num_proveedor.required' => 'Número de proveedor obligatorio',
            'vigencia.required' => 'Ingrese la vigencia de la credencial',
        ];

        $request->validate($rules, $messages);

        $infoCredencial = $request->all();
        // Se envían a la vista los datos del [padron] y datos complementarios contenidos en [infoCredencial]
        $pdf = PDF::loadView('admin.credencial.credencial_pdf', compact('padron', 'infoCredencial'));
        // Se muestra el pdf en el navegador
        return $pdf->stream('credencial.pdf');
    }

    public function openDocument($id)
    {
        $padronRequisito = PadronRequisito::find($id);
        $storage = Storage::path($padronRequisito->ruta);

        return response()->file($storage);
    }
}
