<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('tbl_menus')->insert([
            'menu' => 'Catalogo',
            'clave' => 'admin/catalogos',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => null,
            'orden' => 4
        ]);*/

        DB::table('tbl_menus')->insert([
            'menu' => 'Giros',
            'clave' => 'admin/giros',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => null,
            'icono' => 'fas fa-network-wired',
            'orden' => 5
        ]);

        DB::table('tbl_menus')->insert([
            'menu' => 'Requisitos',
            'clave' => 'admin/requisitos',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => null,
            'icono' => 'fas fa-tasks',
            'orden' => 4
        ]);

        DB::table('tbl_menus')->insert([
            'menu' => 'Usuarios',
            'clave' => 'usuarios',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => null,
            'icono' => 'fas fa-users',
            'orden' => 1
        ]);


        DB::table('tbl_menus')->insert([
            'menu' => 'Padrón',
            'clave' => 'admin/padron',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => null,
            'icono' => 'fas fa-address-card',
            'orden' => 3
        ]);

        DB::table('tbl_menus')->insert([
            'menu' => 'Solicitudes',
            'clave' => 'admin/solicitud',
            'ver' => 1,
            'agregar' => 1,
            'editar' => 1,
            'eliminar' => 1,
            'impresion' => 1,
            'exportar' => 1,
            'validar' => 1,
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => null,
            'icono' => 'fab fa-wpforms',
            'orden' => 2
        ]);
    }
}
