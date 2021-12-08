<?php

use App\Models\V1\Estatus;
use Illuminate\Database\Seeder;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estatus::create(['estatus' => 'Activo', 'clave' => 'ACT']);
        Estatus::create(['estatus' => 'Inactivo', 'clave' => 'INC']);
    }
}
