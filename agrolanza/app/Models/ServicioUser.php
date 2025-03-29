<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioUser extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'servicios_users'; 

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
