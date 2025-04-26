<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
                'direccion' => 'Calle de la Princesa, 1',
                'localidad' => 'Tías',
                'codigo_postal' => '28001',
                'iban' => 'ES9121000418450200051332',
                'fecha_nacimiento' => Carbon::create(1985,6,15),
                'fecha_comienzo' => Carbon::create(2019,6,1),
                'fecha_fin' => null,
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
                'direccion' => 'Camino Los Lirios, 42',
                'localidad' => 'San Bartolomé',
                'codigo_postal' => '28001',
                'iban' => 'ES9121000418450200051332',
                'fecha_nacimiento' => Carbon::create(1985,6,15),
                'fecha_comienzo' => Carbon::create(2023,10,1),
                'fecha_fin' => Carbon::create(2024,1,1),
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
                'direccion' => 'Calle de la Reina, 2',
                'localidad' => 'Arrecife',
                'codigo_postal' => '28002',
                'iban' => 'ES9121000418450200051333',
                'fecha_nacimiento' => Carbon::create(1990,7,22),
                'fecha_comienzo' => Carbon::create(2024,2,1),
                'fecha_fin' => null,
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
                'direccion' => 'Calle Mamerto Cabrera, 54',
                'localidad' => 'Teguise',
                'codigo_postal' => '28003',
                'iban' => 'ES9121000418450200051334',
                'fecha_nacimiento' => Carbon::create(1988,5,10),
                'fecha_comienzo' => Carbon::create(2020,1,1),
                'fecha_fin' => null,
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
                'localidad' => 'Playa Honda',
                'direccion' => 'Calle Manolo Millares, 2 3ºB',
                'codigo_postal' => '28004',
                'iban' => 'ES9121000418450200051335',
                'fecha_nacimiento' => Carbon::create(1995,12,30),
                'fecha_comienzo' => Carbon::create(2020,1,1),
                'fecha_fin' => null,
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
                'direccion' => 'Calle Vera Cruz, 2',
                'localidad' => 'Puerto del Carmen',
                'codigo_postal' => '28005',
                'iban' => 'ES9121000418450200051336',
                'fecha_nacimiento' => Carbon::create(1982,9,25),
                'fecha_comienzo' => Carbon::create(2021,1,1),
                'fecha_fin' => null,
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'ip_alta' => '192.168.1.5',
                'ip_ult_mod' => '192.168.1.5',
                'created_at' => now(),
            ],
        ]);
    }
}
