<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $guarded = ['id'];

    const TIPOS_SERVICIO = [
        'CP' => 'Control de plagas',
        'CM' => 'Control de maleza',
        'SC' => 'Sembrado por cazolejas',
        'SS' => 'Sembrado por surcos',
        'CF' => 'Cosecha de frutos rastreros',
        'RF' => 'Recolecta de frutos arbóreos',
   ];

   const METODOS_PAGO = [
        'EF' => 'Efectivo',
        'TA' => 'Tarjeta',
        'TR' => 'Transferencia'
   ];

   const ESTADOS = [
    'P' => 'Pagado',
    'N' => 'No pagado',
   ];

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'id_parcela');
    }

    public function fitosanitarios()
    {
        return $this->belongsToMany(Fitosanitario::class);
    }

    public function maquinarias()
    {
        return $this->belongsToMany(Maquinaria::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'servicios_users', 'id_servicio', 'id_user');
    }
}
