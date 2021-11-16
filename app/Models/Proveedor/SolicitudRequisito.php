<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class SolicitudRequisito extends Model
{
    protected $fillable = ['nombre', 'ruta', 'requisito_id', 'solicitud_id'];

    public $timestamps = false;

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Proveedor\Solicitud');
    }
}
