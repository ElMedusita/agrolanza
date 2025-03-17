<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fitosanitario extends Model
{
     protected $guarded = ['id'];

    const TIPOS = [
        'HE' => 'Herbicida',
        'IN' => 'Insecticida',
        'FU' => 'Fungicida',
        'BA' => 'Bactericida',
        'NE' => 'Nematicida',
        'AC' => 'Acaricida'
   ];

   const ESTADOS = [
        'PV' => 'Sólido - Líquido',
        'PP' => 'Sólido - Sólido',
        'VV' => 'Líquido - Líquido'
   ];

   public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
    
}
