<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserProveedor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'proveedor';

    protected $fillable = [
        'rfc', 'correo', 'password',
        'tipo_persona', 'razon_social',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function solicituds()
    {
        return $this->hasMany('App\Models\Proveedor\Solicitud');
    }

    public function tipoPersona()
    {
        return $this->belongsTo('App\Models\Proveedor\TipoPersona', 'tipo_persona');
    }
}
