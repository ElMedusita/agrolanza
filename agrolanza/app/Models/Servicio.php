<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $guarded = ['id'];

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'id_parcela');
    }

    public function fitosanitarios()
    {
        return $this->belongsTo(Fitosanitario::class);
    }

    public function maquinarias()
    {
        return $this->belongsTo(Maquinaria::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
