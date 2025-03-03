<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maquinarias')->insert([
            [
                'numero_serie' => 'LZT123456789012',
                'matricula' => 'E1234BBB',
                'marca' => 'John Deere',
                'descripcion' => 'Tractor ligero para cultivos en enarenados volcánicos',
                'ip_alta' => '192.168.1.100',
                'ip_ult_mod' => '192.168.1.100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_serie' => 'LZT987654321098',
                'matricula' => 'E5678CCC',
                'marca' => 'New Holland',
                'descripcion' => 'Cosechadora para trigo, cebada y centeno en terrenos volcánicos',
                'ip_alta' => '192.168.1.101',
                'ip_ult_mod' => '192.168.1.101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_serie' => 'LZT456789012345',
                'matricula' => 'E9012DDD',
                'marca' => 'Claas',
                'descripcion' => 'Máquina especializada para la recolección de olivas en terrenos volcánicos',
                'ip_alta' => '192.168.1.102',
                'ip_ult_mod' => '192.168.1.102',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_serie' => 'LZT789012345678',
                'matricula' => 'E3456EEE',
                'marca' => 'Fendt',
                'descripcion' => 'Pulverizador adaptado para viñedos (compatible para otros tipos de cultivos) en suelos volcánicos',
                'ip_alta' => '192.168.1.103',
                'ip_ult_mod' => '192.168.1.103',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_serie' => 'LZT012345678901',
                'matricula' => 'E7890FFF',
                'marca' => 'Case IH',
                'descripcion' => 'Sembradora especializada para cultivos en suelos arenosos (jable)',
                'ip_alta' => '192.168.1.104',
                'ip_ult_mod' => '192.168.1.104',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
