<?php

use App\Models\V1\Dependencia;
use Illuminate\Database\Seeder;

class TblcDependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dependencia::create([
            'dependencia' => 'Adquisiciones',
            'parentid' => null,
            'nivel' => null
        ]);
    }
}
