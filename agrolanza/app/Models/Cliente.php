<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cliente extends Model
{
    protected $guarded = ['id'];
    public function parcelas(): HasMany
    {
        return $this->hasMany(Parcela::class);
    }
}
