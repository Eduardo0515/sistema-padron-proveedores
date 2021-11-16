<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    //

    protected $table = 'users_estatus';
    public $timestamps= false;


    public function estatus()
    {
        return $this->hasMany(Usuario::class);
    }
}
