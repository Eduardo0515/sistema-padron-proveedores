<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    public function userProveedors()
    {
        return $this->hasMany('App\UserProveedor');
    }
}
