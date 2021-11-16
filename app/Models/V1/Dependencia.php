<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    //

    //use SoftDeletes;
    protected $table = 'tblc_dependencias';

    protected $fillable = [
        "id", 
        "dependencia", 
        "parentid", 
        "nivel"
    ];
   


    public function dependencias()
    {
        return $this->hasMany(Usuario::class);
    }


     public function reportes()
    {
        return $this->hasMany(Reportes::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicios::class);
    }
}
