<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;

class PadronRequisito extends Model
{
    protected $fillable = ['nombre', 'ruta', 'requisito_id', 'padron_id'];

    public $timestamps = false;

    public function padron()
    {
        return $this->belongsTo('App\Models\Proveedor\Padron');
    }
}
