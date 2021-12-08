<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_menus')->insert([
            'user_id'=>1,
            'menu_id'=>1,
            'user_created'=>1,
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
        ]);

        DB::table('users_menus')->insert([
            'user_id'=>1,
            'menu_id'=>2,
            'user_created'=>1,
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
        ]);

        DB::table('users_menus')->insert([
            'user_id'=>1,
            'menu_id'=>3,
            'user_created'=>1,
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
        ]);

        DB::table('users_menus')->insert([
            'user_id'=>1,
            'menu_id'=>4,
            'user_created'=>1,
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
        ]);

        DB::table('users_menus')->insert([
            'user_id'=>1,
            'menu_id'=>5,
            'user_created'=>1,
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
        ]);
    }
}
