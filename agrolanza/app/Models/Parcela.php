<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Parcela extends Model
{
    protected $guarded = ['id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function servicios(): HasMany
    {
        return $this->hasMany(Servicio::class);
    }
}
