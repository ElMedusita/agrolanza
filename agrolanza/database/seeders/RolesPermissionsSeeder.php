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
        // Roles
        $admin = Role::create(['name' => 'admin']);
        $auxiliar = Role::create(['name' => 'auxiliar']);
        $conductor = Role::create(['name' => 'conductor']);
        $aplicador = Role::create(['name' => 'aplicador']);
        
        // Permisos
        
        // Servicios
        $listar_servicio = Permission::create(['name' => 'listar_servicio']);
        $listar_servicios = Permission::create(['name' => 'listar_servicios']);
        $crear_servicio = Permission::create(['name' => 'crear_servicio']);
        $editar_servicio = Permission::create(['name' => 'editar_servicio']);
        $borrar_servicio = Permission::create(['name' => 'borrar_servicio']);
    
        // Clientes
        $listar_cliente = Permission::create(['name' => 'listar_cliente']);
        $listar_clientes = Permission::create(['name' => 'listar_clientes']);
        $crear_cliente = Permission::create(['name' => 'crear_cliente']);
        $editar_cliente = Permission::create(['name' => 'editar_cliente']);
        $borrar_cliente = Permission::create(['name' => 'borrar_cliente']);

        // Parcelas
        $listar_parcela = Permission::create(['name' => 'listar_parcela']);
        $listar_parcelas = Permission::create(['name' => 'listar_parcelas']);
        $crear_parcela = Permission::create(['name' => 'crear_parcela']);
        $editar_parcela = Permission::create(['name' => 'editar_parcela']);
        $borrar_parcela = Permission::create(['name' => 'borrar_parcela']);

        // Maquinarias
        $listar_maquinaria = Permission::create(['name' => 'listar_maquinaria']);
        $listar_maquinarias = Permission::create(['name' => 'listar_maquinarias']);
        $crear_maquinaria = Permission::create(['name' => 'crear_maquinaria']);
        $editar_maquinaria = Permission::create(['name' => 'editar_maquinaria']);
        $borrar_maquinaria = Permission::create(['name' => 'borrar_maquinaria']);

        // Fitosanitarios
        $listar_fitosanitario = Permission::create(['name' => 'listar_fitosanitario']);
        $listar_fitosanitarios = Permission::create(['name' => 'listar_fitosanitarios']);
        $crear_fitosanitario = Permission::create(['name' => 'crear_fitosanitario']);
        $editar_fitosanitario = Permission::create(['name' => 'editar_fitosanitario']);
        $borrar_fitosanitario = Permission::create(['name' => 'borrar_fitosanitario']);

        // Usuarios
        $listar_usuario = Permission::create(['name' => 'listar_usuario']);
        $listar_usuarios = Permission::create(['name' => 'listar_usuarios']);
        $crear_usuario = Permission::create(['name' => 'crear_usuario']);
        $editar_usuario = Permission::create(['name' => 'editar_usuario']);
        $borrar_usuario = Permission::create(['name' => 'borrar_usuario']);

        //Asignar permisos a roles

        //Admin
        $admin->givePermissionTo
        (
            $listar_servicios, $listar_servicio, $crear_servicio, $editar_servicio, $borrar_servicio,
            $listar_clientes, $listar_cliente, $crear_cliente, $editar_cliente, $borrar_cliente,
            $listar_parcelas, $listar_parcela, $crear_parcela, $editar_parcela, $borrar_parcela,
            $listar_maquinarias, $listar_maquinaria, $crear_maquinaria, $editar_maquinaria, $borrar_maquinaria,
            $listar_fitosanitarios, $listar_fitosanitario, $crear_fitosanitario, $editar_fitosanitario, $borrar_fitosanitario,
            $listar_usuarios, $listar_usuario, $crear_usuario, $editar_usuario, $borrar_usuario
        );

        //Auxiliar
        $auxiliar->givePermissionTo
        (
            $listar_servicios, $listar_servicio, $crear_servicio, $editar_servicio, $borrar_servicio,
            $listar_clientes, $listar_cliente, $crear_cliente, $editar_cliente, $borrar_cliente,
            $listar_parcelas, $listar_parcela, $crear_parcela, $editar_parcela, $borrar_parcela,
            $listar_maquinarias, $listar_maquinaria, $crear_maquinaria, $editar_maquinaria, $borrar_maquinaria,
            $listar_fitosanitarios, $listar_fitosanitario, $crear_fitosanitario, $editar_fitosanitario, $borrar_fitosanitario
        );

        //Conductor
        $conductor->givePermissionTo
        (
            $listar_servicios, $listar_servicio,
            $listar_clientes, $listar_cliente,
            $listar_parcelas, $listar_parcela,
            $listar_maquinarias, $listar_maquinaria
        );

        //Aplicador
        $aplicador->givePermissionTo
        (
            $listar_servicios, $listar_servicio,
            $listar_clientes, $listar_cliente,
            $listar_parcelas, $listar_parcela,
            $listar_fitosanitarios, $listar_fitosanitario
        );
    }

}
