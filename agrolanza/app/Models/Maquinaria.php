<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $guarded = ['id'];

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
}
