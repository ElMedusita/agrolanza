<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parcelas')->insert([
            ['id_cliente' => 1, 'referencia_catastral' => '35029A030003350000HO', 'superficie' => 2511, 'latitud' => 29.037688, 'longitud' => -13.688792, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 1, 'referencia_catastral' => '35024A013004760000LJ', 'superficie' => 14746, 'latitud' => 29.023471, 'longitud' => -13.617827, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 2, 'referencia_catastral' => '35024A008009240000LL', 'superficie' => 3395, 'latitud' => 29.014022, 'longitud' => -13.549589, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 3, 'referencia_catastral' => '35024A007001890000LR', 'superficie' => 4913, 'latitud' => 29.020918, 'longitud' => -13.537906, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 4, 'referencia_catastral' => '35024A002000100000LQ', 'superficie' => 1127, 'latitud' => 29.069781, 'longitud' => -13.482376, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 5, 'referencia_catastral' => '35024A021010250000LP', 'superficie' => 3850, 'latitud' => 29.038713, 'longitud' => -13.617165, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 6, 'referencia_catastral' => '35019A001000880000AH', 'superficie' => 1763, 'latitud' => 29.007978, 'longitud' => -13.609103, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 7, 'referencia_catastral' => '35024A018003460000LF', 'superficie' => 2775, 'latitud' => 29.063964, 'longitud' => -13.562353, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 8, 'referencia_catastral' => '35028A001000580000SA', 'superficie' => 4809, 'latitud' => 28.962014, 'longitud' => -13.648252, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 9, 'referencia_catastral' => '35028A017001970000SH', 'superficie' => 3825, 'latitud' => 28.965079, 'longitud' => -13.665857, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 10, 'referencia_catastral' => '35034A007006290000QF', 'superficie' => 2015, 'latitud' => 28.946094, 'longitud' => -13.744485, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 2, 'referencia_catastral' => '35011A015003380000WH', 'superficie' => 4012, 'latitud' => 29.099078, 'longitud' => -13.476279, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 5, 'referencia_catastral' => '35011A007005670000WF', 'superficie' => 3289, 'latitud' => 29.161257, 'longitud' => -13.484916, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 8, 'referencia_catastral' => '35024A022001880000LG', 'superficie' => 5711, 'latitud' => 29.096430, 'longitud' => -13.617747, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()],
            ['id_cliente' => 10, 'referencia_catastral' => '35024A016001980000LP', 'superficie' => 7294, 'latitud' => 29.078025, 'longitud' => -13.527759, 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now()]
        ]);
    }
}
