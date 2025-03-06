<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            ['tipo_servicio' => 'CP', 'descripcion' => 'Control de plagas en jardín', 'metodo_pago' => 'EF', 'fecha_servicio' => '2025-01-15 08:00:00', 'duracion' => 2, 'presupuesto' => 150.00, 'forma_pago' => 'EF', 'estado' => 'P', 'id_parcela' => 1, 'ip_alta' => '192.168.1.1', 'created_at' => now()],
            ['tipo_servicio' => 'CM', 'descripcion' => 'Control de maleza en patio', 'metodo_pago' => 'TA', 'fecha_servicio' => '2025-02-10 09:30:00', 'duracion' => 3, 'presupuesto' => 120.50, 'forma_pago' => 'TA', 'estado' => 'N', 'id_parcela' => 2, 'ip_alta' => '192.168.1.2', 'created_at' => now()],
            ['tipo_servicio' => 'SC', 'descripcion' => 'Sembrado en cazolejas', 'metodo_pago' => 'TR', 'fecha_servicio' => '2025-03-05 07:45:00', 'duracion' => 4, 'presupuesto' => 200.00, 'forma_pago' => 'TR', 'estado' => 'P', 'id_parcela' => 3, 'ip_alta' => '192.168.1.3', 'created_at' => now()],
            ['tipo_servicio' => 'SS', 'descripcion' => 'Sembrado por surcos en campo', 'metodo_pago' => 'EF', 'fecha_servicio' => '2025-04-20 10:15:00', 'duracion' => 5, 'presupuesto' => 175.75, 'forma_pago' => 'EF', 'estado' => 'N', 'id_parcela' => 4, 'ip_alta' => '192.168.1.4', 'created_at' => now()],
            ['tipo_servicio' => 'CP', 'descripcion' => 'Control de plagas en almacén', 'metodo_pago' => 'TR', 'fecha_servicio' => '2025-05-12 11:00:00', 'duracion' => 2, 'presupuesto' => 220.00, 'forma_pago' => 'TR', 'estado' => 'P', 'id_parcela' => 5, 'ip_alta' => '192.168.1.5', 'created_at' => now()],
            ['tipo_servicio' => 'CM', 'descripcion' => 'Eliminación de maleza en camino', 'metodo_pago' => 'EF', 'fecha_servicio' => '2025-06-08 07:30:00', 'duracion' => 3, 'presupuesto' => 130.00, 'forma_pago' => 'EF', 'estado' => 'N', 'id_parcela' => 6, 'ip_alta' => '192.168.1.6', 'created_at' => now()],
            ['tipo_servicio' => 'SC', 'descripcion' => 'Sembrado de pasto', 'metodo_pago' => 'TA', 'fecha_servicio' => '2025-07-22 09:45:00', 'duracion' => 4, 'presupuesto' => 195.00, 'forma_pago' => 'TA', 'estado' => 'P', 'id_parcela' => 7, 'ip_alta' => '192.168.1.7', 'created_at' => now()],
            ['tipo_servicio' => 'SS', 'descripcion' => 'Sembrado de flores en parque', 'metodo_pago' => 'TR', 'fecha_servicio' => '2025-08-14 12:00:00', 'duracion' => 5, 'presupuesto' => 180.00, 'forma_pago' => 'TR', 'estado' => 'N', 'id_parcela' => 8, 'ip_alta' => '192.168.1.8', 'created_at' => now()],
            ['tipo_servicio' => 'CP', 'descripcion' => 'Control de plagas en viñedo', 'metodo_pago' => 'EF', 'fecha_servicio' => '2025-09-10 08:15:00', 'duracion' => 2, 'presupuesto' => 210.00, 'forma_pago' => 'EF', 'estado' => 'P', 'id_parcela' => 9, 'ip_alta' => '192.168.1.9', 'created_at' => now()],
            ['tipo_servicio' => 'CM', 'descripcion' => 'Limpieza de maleza en huerto', 'metodo_pago' => 'TA', 'fecha_servicio' => '2025-10-18 09:00:00', 'duracion' => 3, 'presupuesto' => 140.50, 'forma_pago' => 'TA', 'estado' => 'N', 'id_parcela' => 10, 'ip_alta' => '192.168.1.10', 'created_at' => now()],
            ['tipo_servicio' => 'SC', 'descripcion' => 'Siembra de trigo', 'metodo_pago' => 'TR', 'fecha_servicio' => '2025-11-25 07:30:00', 'duracion' => 4, 'presupuesto' => 250.00, 'forma_pago' => 'TR', 'estado' => 'P', 'id_parcela' => 11, 'ip_alta' => '192.168.1.11', 'created_at' => now()],
            ['tipo_servicio' => 'SS', 'descripcion' => 'Siembra de maíz en surcos', 'metodo_pago' => 'EF', 'fecha_servicio' => '2025-12-05 10:45:00', 'duracion' => 5, 'presupuesto' => 230.75, 'forma_pago' => 'EF', 'estado' => 'N', 'id_parcela' => 12, 'ip_alta' => '192.168.1.12', 'created_at' => now()],
            ['tipo_servicio' => 'CP', 'descripcion' => 'Control de plagas en invernadero', 'metodo_pago' => 'TR', 'fecha_servicio' => '2026-01-15 08:00:00', 'duracion' => 2, 'presupuesto' => 170.00, 'forma_pago' => 'TR', 'estado' => 'P', 'id_parcela' => 13, 'ip_alta' => '192.168.1.13', 'created_at' => now()],
            ['tipo_servicio' => 'CM', 'descripcion' => 'Eliminación de maleza en sendero', 'metodo_pago' => 'TA', 'fecha_servicio' => '2026-02-20 09:30:00', 'duracion' => 3, 'presupuesto' => 125.00, 'forma_pago' => 'TA', 'estado' => 'N', 'id_parcela' => 14, 'ip_alta' => '192.168.1.14', 'created_at' => now()],
            ['tipo_servicio' => 'SC', 'descripcion' => 'Sembrado de hortalizas', 'metodo_pago' => 'EF', 'fecha_servicio' => '2026-03-10 07:45:00', 'duracion' => 4, 'presupuesto' => 205.00, 'forma_pago' => 'EF', 'estado' => 'P', 'id_parcela' => 15, 'ip_alta' => '192.168.1.15', 'created_at' => now()],
        ]);
    }
}
