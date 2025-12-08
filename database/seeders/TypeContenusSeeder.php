<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeContenu;

class TypeContenusSeeder extends Seeder
{
    public function run(): void
    {
        TypeContenu::insert([
            ['nom_contenu' => 'Article'],
            ['nom_contenu' => 'Vidéo'],
            ['nom_contenu' => 'Podcast'],
            ['nom_contenu' => 'Document'],
        ]);
    }
}
