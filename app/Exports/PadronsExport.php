<?php

namespace App\Exports;

use App\Models\Proveedor\Padron;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PadronsExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    /*public function collection()
    {
        return Padron::all();
    }*/
    use Exportable;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
    }

    public function query()
    {
        return Padron::query()->where($this->conditions);
    }

    public function headings(): array
    {
        return [
            'ID padrón',
            'ID de usuario',
            'R.F.C.',
            'Correo',
            'Teléfono',
            'Extensión',
            'Tipo de persona',
            'Nombres',
            'Apellidos',
            'Razón social',
            'Capital contable',
            'Domicilio',
            'Número exterior',
            'Número interior',
            'Colonia',
            'Localidad',
            'Ciudad',
            'Entidad',
            'País',
            'Código postal',
            'Latitud',
            'Longitud',
            'Creado',
            'Actualizado'
        ];
    }
}
