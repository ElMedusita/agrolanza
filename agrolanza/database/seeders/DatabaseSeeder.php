<?php

namespace Database\Seeders;

use App\Models\User;
/* use App\Models\Cliente; */
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(ParcelasSeeder::class);
        $this->call(MaquinariasSeeder::class);
        $this->call(FitosanitariosSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(ServiciosUsersSeeder::class);
        $this->call(ServiciosMaquinariasSeeder::class);
        $this->call(ServiciosFitosanitariosSeeder::class);
        }
}
