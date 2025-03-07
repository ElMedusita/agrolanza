<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $admin = Role::create(['name' => 'admin']);
        $auxiliar = Role::create(['name' => 'auxiliar']);
        $conductor = Role::create(['name' => 'conductor']);
        $aplicador = Role::create(['name' => 'aplicador']);
        
        //Permisos
        $createPost = Permission::create(['name' => 'create post']);
    }
}
