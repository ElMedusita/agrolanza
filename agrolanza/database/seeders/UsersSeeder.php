<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'identificacion' => '78592929C',
                'name' => 'Alexis',
                'apellidos' => 'Gil Cabrera',
                'email' => 'alexisgilcabrera@gmail.com',
                'telefono' => '655278128',
                'codigo_postal' => '28001',
                'iban' => 'ES9121000418450200051332',
                'fecha_nacimiento' => '1985-06-15',
                'password' => bcrypt('csas1234'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.1',
                'ip_ult_mod' => '192.168.1.1',
                'created_at' => now(),
            ],
            [
                'identificacion' => '12345678A',
                'name' => 'Juan',
                'apellidos' => 'Pérez Gómez',
                'email' => 'juan.perez@example.com',
                'telefono' => '612345678',
                'codigo_postal' => '28001',
                'iban' => 'ES9121000418450200051332',
                'fecha_nacimiento' => '1985-06-15',
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.1',
                'ip_ult_mod' => '192.168.1.1',
                'created_at' => now(),
            ],
            [
                'identificacion' => '87654321B',
                'name' => 'María',
                'apellidos' => 'López Fernández',
                'email' => 'maria.lopez@example.com',
                'telefono' => '622345678',
                'codigo_postal' => '28002',
                'iban' => 'ES9121000418450200051333',
                'fecha_nacimiento' => '1990-07-22',
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.2',
                'ip_ult_mod' => '192.168.1.2',
                'created_at' => now(),
            ],
            [
                'identificacion' => '11223344C',
                'name' => 'Carlos',
                'apellidos' => 'Sánchez Ruiz',
                'email' => 'carlos.sanchez@example.com',
                'telefono' => '632345678',
                'codigo_postal' => '28003',
                'iban' => 'ES9121000418450200051334',
                'fecha_nacimiento' => '1988-05-10',
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.3',
                'ip_ult_mod' => '192.168.1.3',
                'created_at' => now(),
            ],
            [
                'identificacion' => '55667788D',
                'name' => 'Laura',
                'apellidos' => 'Martínez Castro',
                'email' => 'laura.martinez@example.com',
                'telefono' => '642345678',
                'codigo_postal' => '28004',
                'iban' => 'ES9121000418450200051335',
                'fecha_nacimiento' => '1995-12-30',
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.4',
                'ip_ult_mod' => '192.168.1.4',
                'created_at' => now(),
            ],
            [
                'identificacion' => '66778899E',
                'name' => 'David',
                'apellidos' => 'Hernández Torres',
                'email' => 'david.hernandez@example.com',
                'telefono' => '652345678',
                'codigo_postal' => '28005',
                'iban' => 'ES9121000418450200051336',
                'fecha_nacimiento' => '1982-09-25',
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.5',
                'ip_ult_mod' => '192.168.1.5',
                'created_at' => now(),
            ],
        ]);
    }
}
