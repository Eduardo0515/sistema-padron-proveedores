<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'estatus', 'user_proveedor_id', 'rfc',
        'correo', 'telefono', 'extension',
        'tipo_persona', 'nombres', 'apellidos', 'razon_social',
        'capital_contable', 'domicilio', 'num_exterior', 'num_interior',
        'colonia', 'localidad', 'ciudad', 'entidad', 'pais', 'codigo_postal',
        'latitud', 'longitud'
    ];

    public function userSolicitud()
    {
        return $this->belongsTo('App\UserProveedor');
    }

    public function solicitudRequisitos()
    {
        return $this->hasMany('App\Models\Proveedor\SolicitudRequisito');
    }

    public function comentarios()
    {
        // Obtener todos los comentarios, mostrando los más recientes primero
        return $this->hasMany('App\Models\Proveedor\Comentario')->orderBy('created_at', 'desc');
    }
}
