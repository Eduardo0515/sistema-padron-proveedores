<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Padron;
use PDF;
use Illuminate\Http\Request;

class AdminPadronController extends Controller
{
    public function index()
    {
        $padrons = Padron::paginate();

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
        $pdf = PDF::loadView('admin.credencial.credencial_pdf', compact('padron', 'infoCredencial'));
        return $pdf->stream('credencial.pdf');
    }
}
