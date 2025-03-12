<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fitosanitario extends Model
{
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
}
