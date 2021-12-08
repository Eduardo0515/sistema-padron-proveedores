<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    protected $fillable = ['nombre', 'codigo'];
    
    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Proveedor\Solicitud');
    }
}
