<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Giro;
use Illuminate\Http\Request;

class GiroController extends Controller
{
    public function index()
    {
        return view('admin.giros.index');
    }

    public function getGiros()
    {
        $giros = Giro::all();
        $response = [
            'success' => true,
            'html' => view('admin.giros.tabla_giros', compact('giros'))->render()
        ];
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El nombre del giro es obligatorio',
            'codigo.required' => 'El codigo del giro es obligatorio',
        ];
        $rules = [
            'nombre' => 'required',
            'codigo' => 'required'
        ];

        $request->validate($rules, $messages);

        Giro::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo
        ]);
        return redirect()->route('admin.giros');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nombre_edit.required' => 'El nombre del giro es obligatorio',
            'codigo_edit.required' => 'El codigo del giro es obligatorio',
        ];
        $rules = [
            'nombre_edit' => 'required',
            'codigo_edit' => 'required'
        ];

        $request->validate($rules, $messages);

        $giro = Giro::find($id);
        $giro->nombre = $request->nombre_edit;
        $giro->codigo = $request->codigo_edit;
        $giro->save();

        return redirect()->route('admin.giros');
    }

    public function destroy($id)
    {
        Giro::find($id)->delete();
    }
}
