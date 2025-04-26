<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosFitosanitariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios_fitosanitarios')->insert([
            [
                'id_servicio' => 1,
                'id_fitosanitario' => 1,
                'ip_alta' => '192.168.1.1',
                'ip_ult_mod' => '192.168.1.1',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 2,
                'id_fitosanitario' => 2,
                'ip_alta' => '192.168.1.2',
                'ip_ult_mod' => '192.168.1.2',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 2,
                'id_fitosanitario' => 3,
                'ip_alta' => '192.168.1.2',
                'ip_ult_mod' => '192.168.1.2',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 3,
                'id_fitosanitario' => 4,
                'ip_alta' => '192.168.1.3',
                'ip_ult_mod' => '192.168.1.3',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 4,
                'id_fitosanitario' => 5,
                'ip_alta' => '192.168.1.4',
                'ip_ult_mod' => '192.168.1.4',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 5,
                'id_fitosanitario' => 6,
                'ip_alta' => '192.168.1.5',
                'ip_ult_mod' => '192.168.1.5',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 6,
                'id_fitosanitario' => 7,
                'ip_alta' => '192.168.1.6',
                'ip_ult_mod' => '192.168.1.6',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 7,
                'id_fitosanitario' => 8,
                'ip_alta' => '192.168.1.7',
                'ip_ult_mod' => '192.168.1.7',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 8,
                'id_fitosanitario' => 9,
                'ip_alta' => '192.168.1.8',
                'ip_ult_mod' => '192.168.1.8',
                'created_at' => now(),
            ],
            [
                'id_servicio' => 8,
                'id_fitosanitario' => 10,
                'ip_alta' => '192.168.1.8',
                'ip_ult_mod' => '192.168.1.8',
                'created_at' => now(),
            ]
        ]);
        
    }
}
