<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\V1\Usuario;
use App\Models\V1\Menu;
use Auth;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $info = Usuario::where('id', $id)->first();
        //$menus = Menu::where('id','>', 0)->get();
        $privilegios = Menu::selectRaw("tbl_menus.*, IFNULL(UM.ver,0) ver2, IFNULL(UM.agregar,0) agregar2, IFNULL(UM.editar,0) editar2, IFNULL(UM.eliminar,0) eliminar2, IFNULL(UM.impresion,0) impresion2, IFNULL(UM.exportar,0) exportar2, IFNULL(UM.validar,0) validar2, IFNULL(UM.estatus,0) estatus2")
        ->leftJoin('users_menus AS UM', function($join) use ($id)
        {
            $join->on('tbl_menus.id', '=', 'UM.menu_id')
            ->where('UM.user_id', $id);
        })
        ->where('tbl_menus.estatus', 1)
            ->orderby('tbl_menus.orden')
            ->orderby('tbl_menus.menu')
            ->get();

        return view('usuarios.privileges', compact('info','privilegios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($request);
        $data = [];
        $ver=0;
        $agregar=0;
        $editar=0;
        $eliminar=0;
        $exportar=0;
        $impresion=0;
        //for($i=0; $i<count($request->input("id_menu")); $i++){
        foreach($request->input("id_menu") as $value){
            //$id_menu=$request->input("id_menu.".$i);
            $id_menu=$value;
            if($request->input("ver_".$value)==1){

                if($request->has("ver_".$value)) $ver=$request->input("ver_".$value);

                if($request->has("agregar_".$value)) $agregar=$request->input("agregar_".$value);

                if($request->has("editar_".$value)) $editar=$request->input("editar_".$value);

                if($request->has("eliminar_".$value)) $eliminar=$request->input("eliminar_".$value);

                if($request->has("exportar_".$value)) $exportar=$request->input("exportar_".$value);

                if($request->has("impresion_".$value)) $impresion=$request->input("impresion_".$value);



                $data[]= array('user_id' => $request->input("id_registro"), 'menu_id' => $id_menu, 'ver' => $ver, 'agregar' => $agregar, 'editar' => $editar, 'eliminar' =>$eliminar, 'exportar' => $exportar, 'impresion' => $impresion,'estatus' => 1, 'user_created'=>Auth::user()->id,'fecha_created'=>date('Y-m-d H:i:s'));
            }
        }
        //dd($data);
        $obj_tabla = new Usuario;
        return  $obj_tabla->update_privilleges($data,$request->input("id_registro"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
