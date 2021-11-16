<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function read(Request $request)
    {
        $solicitud_id = $request->solicitud_id;
        $comentarios = Comentario::where('solicitud_id', '=', $solicitud_id)->orderBy('created_at','desc')->get();
        return view('proveedor-admin.comentarios', compact('comentarios'));
    }

}
