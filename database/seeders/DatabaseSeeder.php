<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@rovaltech.com'],
            [
                'name' => 'Administrador Roval Tech',
                'password' => Hash::make('RvT-2026-Kipu-7mQ4!'),
                'email_verified_at' => now(),
            ]
        );

        $projects = [
            [
                'title' => 'Robot Soccer',
                'category' => 'Robótica competitiva',
                'summary' => 'Equipo autónomo de fútbol con visión por computadora, control de motores y estrategia en tiempo real.',
                'description' => "Desarrollo integral de un robot soccer autónomo: diseño mecánico del chasis, sistema de visión para detección de balón y rivales, algoritmos de navegación y control de motores de alta respuesta. El sistema toma decisiones de ataque y defensa en tiempo real durante el partido.",
                'year' => '2025',
                'client' => 'Proyecto interno Roval Tech',
                'featured' => true,
                'published' => true,
            ],
            [
                'title' => 'Robot Sumo',
                'category' => 'Robótica competitiva',
                'summary' => 'Robot de sumo con sensores de línea, detección de oponente y estrategia de empuje automática.',
                'description' => "Diseño y construcción de un robot sumo compacto y robusto. Integra sensores infrarrojos para detectar el borde del dohyo, sensores de proximidad para localizar al oponente y un sistema de tracción de alto torque. La lógica de combate prioriza la estabilidad y el empuje en el momento correcto.",
                'year' => '2025',
                'client' => 'Proyecto interno Roval Tech',
                'featured' => true,
                'published' => true,
            ],
            [
                'title' => 'Línea de Producción Automatizada',
                'category' => 'Automatización industrial',
                'summary' => 'Control de procesos y supervisión de una línea de ensamble con PLC, HMI y telemetría.',
                'description' => "Implementación de un sistema de automatización para una línea de ensamble: control lógico programable, interfaces hombre-máquina, sensores de posición y sistema de monitoreo que registra ciclos, tiempos y eventos de mantenimiento.",
                'year' => '2024',
                'client' => 'Cliente industrial',
                'featured' => true,
                'published' => true,
            ],
            [
                'title' => 'Sistema Domótico Inteligente',
                'category' => 'Domótica e IoT',
                'summary' => 'Control centralizado de iluminación, climatización y seguridad desde una interfaz web.',
                'description' => "Solución domótica que integra control de iluminación, climatización y seguridad en una sola plataforma. Incluye programación de escenas, monitoreo remoto y panel de control responsive.",
                'year' => '2024',
                'client' => 'Proyecto residencial',
                'featured' => false,
                'published' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($project['title'])],
                $project
            );
        }
    }
}
