<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FitosanitariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fitosanitarios')->insert([
            [
                'nombre' => 'Confidor 20 LS',
                'marca' => 'Bayer CropScience',
                'tipo' => 'IN',
                'descripcion' => 'Insecticida sistémico para el control de diversas plagas.',
                'entidad_vendedora' => 'Fitosanitarios Lanzarote S.C.',
                'materia_activa' => 'Imidacloprid',
                'dosis_maxima' => 0.5,
                'plazo_seguridad' => 21,
                'observaciones' => 'Aplicar en horas de baja insolación para evitar evaporación.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Roundup UltraPlus',
                'marca' => 'Monsanto Agricultura España',
                'tipo' => 'HE',
                'descripcion' => 'Herbicida no selectivo para el control de malezas.',
                'entidad_vendedora' => 'Servimor Lanzarote',
                'materia_activa' => 'Glifosato',
                'dosis_maxima' => 4.0,
                'plazo_seguridad' => 7,
                'observaciones' => 'Evitar el contacto con cultivos deseados.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Aliette WG',
                'marca' => 'Bayer CropScience',
                'tipo' => 'FU',
                'descripcion' => 'Fungicida sistémico para el control de enfermedades fúngicas.',
                'entidad_vendedora' => 'Tahiche Garden Lanzarote',
                'materia_activa' => 'Fosetil-Al',
                'dosis_maxima' => 3.0,
                'plazo_seguridad' => 15,
                'observaciones' => 'Recomendado para cultivos de vid y cítricos.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Decis Protech',
                'marca' => 'Bayer CropScience',
                'tipo' => 'IN',
                'descripcion' => 'Insecticida piretroide de amplio espectro.',
                'entidad_vendedora' => 'Fitosanitarios Lanzarote S.C.',
                'materia_activa' => 'Deltametrina',
                'dosis_maxima' => 0.3,
                'plazo_seguridad' => 7,
                'observaciones' => 'Eficaz contra lepidópteros y otros insectos.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Folicur WG',
                'marca' => 'Bayer CropScience',
                'tipo' => 'FU',
                'descripcion' => 'Fungicida sistémico para el control de oídios y royas.',
                'entidad_vendedora' => 'Servimor Lanzarote',
                'materia_activa' => 'Tebuconazol',
                'dosis_maxima' => 1.0,
                'plazo_seguridad' => 14,
                'observaciones' => 'Aplicar preventivamente para mejores resultados.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Karate Zeon',
                'marca' => 'Syngenta Agro S.A.',
                'tipo' => 'IN',
                'descripcion' => 'Insecticida piretroide microencapsulado.',
                'entidad_vendedora' => 'Fitosanitarios Lanzarote S.C.',
                'materia_activa' => 'Lambda-cihalotrina',
                'dosis_maxima' => 0.2,
                'plazo_seguridad' => 14,
                'observaciones' => 'Eficaz contra insectos masticadores y chupadores.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Ridomil Gold',
                'marca' => 'Syngenta Agro S.A.',
                'tipo' => 'FU',
                'descripcion' => 'Fungicida sistémico para el control de mildiu.',
                'entidad_vendedora' => 'Tahiche Garden Lanzarote',
                'materia_activa' => 'Metalaxil-M',
                'dosis_maxima' => 2.5,
                'plazo_seguridad' => 21,
                'observaciones' => 'No aplicar en épocas de alta humedad.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Maton',
                'marca' => 'Probelte S.A.',
                'tipo' => 'HE',
                'descripcion' => 'Herbicida selectivo para cereales.',
                'entidad_vendedora' => 'Servimor Lanzarote',
                'materia_activa' => 'MCPA',
                'dosis_maxima' => 1.5,
                'plazo_seguridad' => 30,
                'observaciones' => 'Evitar aplicar en cultivos de hoja ancha.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Ortiva',
                'marca' => 'Syngenta Agro S.A.',
                'tipo' => 'FU',
                'descripcion' => 'Fungicida de amplio espectro para hortícolas.',
                'entidad_vendedora' => 'Tahiche Garden Lanzarote',
                'materia_activa' => 'Azoxistrobina',
                'dosis_maxima' => 1.0,
                'plazo_seguridad' => 3,
                'observaciones' => 'Recomendado para cultivos de tomate y pimiento.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ],
            [
                'nombre' => 'Pirimor G',
                'marca' => 'Syngenta Agro S.A.',
                'tipo' => 'IN',
                'descripcion' => 'Insecticida específico para pulgones.',
                'entidad_vendedora' => 'Fitosanitarios Lanzarote S.C.',
                'materia_activa' => 'Pirimicarb',
                'dosis_maxima' => 0.5,
                'plazo_seguridad' => 7,
                'observaciones' => 'No afecta a insectos beneficiosos.',
                'ip_alta' => null,
                'ip_ult_mod' => null
            ]
        ]);
    }
}
