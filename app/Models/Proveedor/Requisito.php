<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $fillable = ['nombre', 'requerido'];

    public $timestamps = false;
}
