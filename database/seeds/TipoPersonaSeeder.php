<?php

use App\Models\Proveedor\TipoPersona;
use Illuminate\Database\Seeder;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPersona::create(['tipo_persona' => 'Persona física']);
        TipoPersona::create(['tipo_persona' => 'Persona moral']);
    }
}
