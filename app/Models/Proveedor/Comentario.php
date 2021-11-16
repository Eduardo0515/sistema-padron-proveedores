<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['comentario', 'solicitud_id'];

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Proveedor\Solicitud');
    }
}
