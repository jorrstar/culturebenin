<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenu;

class ContenusSeeder extends Seeder
{
    public function run(): void
    {
        Contenu::insert([
            [
                'titre' => 'Histoire du Bénin',
                'texte' => 'Un rapide résumé historique...',
                'date_creation' => now(),
                'statut' => 'valide',
                'parent_id' => null,
                'date_validation' => now(),
                'id_region' => 1,
                'id_langue' => 1,
                'id_moderateur' => 1,
                'id_type_contenu' => 1,
                'id_auteur' => 2,
            ],
        ]);
    }
}
