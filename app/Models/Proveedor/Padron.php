<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Padron extends Model
{
    protected $fillable = [
        'user_proveedor_id', 'rfc',
        'correo', 'telefono', 'extension',
        'tipo_persona', 'nombres', 'apellidos', 'razon_social',
        'capital_contable', 'domicilio', 'num_exterior', 'num_interior',
        'colonia', 'localidad', 'ciudad', 'entidad', 'pais', 'codigo_postal',
        'latitud', 'longitud'
    ];

    public function userProveedor()
    {
        return $this->belongsTo('App\UserProveedor');
    }

    public function padronRequisitos()
    {
        return $this->hasMany('App\Models\Proveedor\PadronRequisito');
    }

    public function giros()
    {
        return $this->belongsToMany('App\Models\Proveedor\Giro');
    }
}
