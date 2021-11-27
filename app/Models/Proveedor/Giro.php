<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Proveedor\Solicitud');
    }
}
