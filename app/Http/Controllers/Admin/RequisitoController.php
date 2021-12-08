<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Requisito;
use Illuminate\Http\Request;

class RequisitoController extends Controller
{
    public function index()
    {
        return view('admin.requisitos.index');
    }

    public function getRequisitos()
    {
        $requisitos = Requisito::all();
        $response = [
            'success' => true,
            'html' => view('admin.requisitos.tabla_requisitos', compact('requisitos'))->render()
        ];
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El nombre del requisito es obligatorio',
        ];
        $rules = [
            'nombre' => 'required',
        ];

        $request->validate($rules, $messages);

        Requisito::create([
            'nombre' => $request->nombre,
            'requerido' => $request->requerido == null ? 0 : 1
        ]);
        return redirect()->route('admin.requisitos');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nombre_edit.required' => 'El nombre del requisito es obligatorio',
        ];
        $rules = [
            'nombre_edit' => 'required',
        ];

        $request->validate($rules, $messages);

        $requisito = Requisito::find($id);
        $requisito->nombre = $request->nombre_edit;
        $requisito->requerido = $request->requerido_edit == null ? 0 : 1;
        $requisito->save();

        return redirect()->route('admin.requisitos');
    }

    public function destroy($id)
    {
        Requisito::find($id)->delete();
    }
}
