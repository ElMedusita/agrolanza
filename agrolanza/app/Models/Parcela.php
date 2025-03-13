<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

}
