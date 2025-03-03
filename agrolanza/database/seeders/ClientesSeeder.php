<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['identificacion' => '67890123K', 'nombre' => 'Fernando', 'apellidos' => 'Gómez Serrano', 'email' => 'fernando@example.com', 'telefono' => '692345678', 'codigo_postal' => '28011', 'ip_alta' => '192.168.1.21', 'ip_ult_mod' => '192.168.1.22', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => 'X6789012L', 'nombre' => 'Isabel', 'apellidos' => 'Ruiz Méndez', 'email' => 'isabel@example.com', 'telefono' => '693456789', 'codigo_postal' => '28012', 'ip_alta' => '192.168.1.23', 'ip_ult_mod' => '192.168.1.24', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => '78901234M', 'nombre' => 'Alejandro', 'apellidos' => 'Fernández Castro', 'email' => 'alejandro@example.com', 'telefono' => '694567890', 'codigo_postal' => '28013', 'ip_alta' => '192.168.1.25', 'ip_ult_mod' => '192.168.1.26', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => 'Y7890123N', 'nombre' => 'Patricia', 'apellidos' => 'Jiménez Romero', 'email' => 'patricia@example.com', 'telefono' => '695678901', 'codigo_postal' => '28014', 'ip_alta' => '192.168.1.27', 'ip_ult_mod' => '192.168.1.28', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => '89012345O', 'nombre' => 'Manuel', 'apellidos' => 'Hernández Pardo', 'email' => 'manuel@example.com', 'telefono' => '696789012', 'codigo_postal' => '28015', 'ip_alta' => '192.168.1.29', 'ip_ult_mod' => '192.168.1.30', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => 'Z8901234P', 'nombre' => 'Carmen', 'apellidos' => 'Santos Villanueva', 'email' => 'carmen@example.com', 'telefono' => '697890123', 'codigo_postal' => '28016', 'ip_alta' => '192.168.1.31', 'ip_ult_mod' => '192.168.1.32', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => '90123456Q', 'nombre' => 'Antonio', 'apellidos' => 'Navarro Solís', 'email' => 'antonio@example.com', 'telefono' => '698901234', 'codigo_postal' => '28017', 'ip_alta' => '192.168.1.33', 'ip_ult_mod' => '192.168.1.34', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => 'X9012345R', 'nombre' => 'Lucía', 'apellidos' => 'Ortega Mendoza', 'email' => 'lucia@example.com', 'telefono' => '699012345', 'codigo_postal' => '28018', 'ip_alta' => '192.168.1.35', 'ip_ult_mod' => '192.168.1.36', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => '01234567S', 'nombre' => 'Raúl', 'apellidos' => 'Castillo Domínguez', 'email' => 'raul@example.com', 'telefono' => '600123456', 'codigo_postal' => '28019', 'ip_alta' => '192.168.1.37', 'ip_ult_mod' => '192.168.1.38', 'created_at' => now(), 'updated_at' => now()],
            ['identificacion' => 'Y0123456T', 'nombre' => 'Marta', 'apellidos' => 'Velasco Martín', 'email' => 'marta@example.com', 'telefono' => '601234567', 'codigo_postal' => '28020', 'ip_alta' => '192.168.1.39', 'ip_ult_mod' => '192.168.1.40', 'created_at' => now(), 'updated_at' => now()]
        ]);
        
    }
}
