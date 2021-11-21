<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Padron;
use Illuminate\Http\Request;
use PDF;

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
        //return view('admin.credencial.credencial_pdf', compact('padron'));
        return view('admin.credencial.credencial_pdf',compact('padron'));
    }

    public function generarCredencial(Padron $padron)
    {
        //$pdf->setPaper('a4', 'portrait');
        $pdf = PDF::loadView('admin.credencial.credencial_pdf', compact('padron'));
        return $pdf->stream('credencial.pdf');
    }
}
