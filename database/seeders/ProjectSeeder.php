<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'author' => 'Giovanni Rossi',
                'title' => 'Sito Portfolio Creativo',
                'project_image' => 'https://img.freepik.com/premium-psd/creative-portfolio-website-psd-template_91234-1.jpg',
                'description' => 'Un portfolio digitale per esporre lavori di design e fotografia.',
                'date' => '2023-01-15',
            ],
            [
                'author' => 'Maria Bianchi',
                'title' => 'Blog di Cucina Italiana',
                'project_image' => 'https://www.ottimiprodotti.it/wp-content/uploads/2020/11/Lennesimo-Blog.jpg',
                'description' => 'Ricette italiane autentiche e consigli di cucina per principianti.',
                'date' => '2023-02-20',
            ],
            [
                'author' => 'Luca Verdi',
                'title' => 'Applicazione di Fitness',
                'project_image' => 'https://www.smartworld.it/images/2022/09/06/sfida-fitness_crop_resize.png',
                'description' => 'Una guida completa per rimanere in forma con esercizi e piani alimentari.',
                'date' => '2023-03-10',
            ],
            [
                'author' => 'Sofia Neri',
                'title' => 'Piattaforma Educativa Online',
                'project_image' => 'https://s.tmimgcdn.com/scr/1200x750/302000/modello-dell39interfaccia-utente-del-sito-web-della-piattaforma-educativa_302075-original.jpg',
                'description' => 'Corsi online per imparare nuove abilità, dalla programmazione alla pittura.',
                'date' => '2023-04-05',
            ],
            [
                'author' => 'Marco Gialli',
                'title' => 'Negozio di E-commerce Sostenibile',
                'project_image' => 'https://www.idexaweb.com/wp-content/uploads/2022/08/Sviluppo-ecommerce-prestashop-per-erboristeria-600x400.jpg',
                'description' => 'Prodotti ecologici e sostenibili per una vita più verde.',
                'date' => '2023-05-21',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
