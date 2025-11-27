<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title' => 'Site vitrine élégant',
                'category' => 'design',
                'technologies' => 'HTML,CSS,JS,Laravel',
                'short_description' => 'Un site vitrine moderne pour présenter une marque.',
                'description' => 'Site responsive avec animations et portfolio.',
                'image_path' => null,
                'status' => 'completed',
                'duration' => '3 semaines',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Application mobile',
                'category' => 'mobile',
                'technologies' => 'Flutter,API',
                'short_description' => 'Application mobile multiplateforme.',
                'description' => 'App native-like avec synchronisation cloud.',
                'image_path' => null,
                'status' => 'in_progress',
                'duration' => '2 mois',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dashboard Admin',
                'category' => 'design',
                'technologies' => 'React,Node,MySQL',
                'short_description' => 'Tableau de bord pour la gestion des utilisateurs.',
                'description' => 'Widgets et graphiques temps-réel.',
                'image_path' => null,
                'status' => 'planned',
                'duration' => '1 mois',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($projects as $p) {
            DB::table('projects')->insert($p);
        }
    }
}
