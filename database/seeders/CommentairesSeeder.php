<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentairesSeeder extends Seeder
{
    public function run(): void
    {
        Commentaire::insert([
            [
                'texte' => 'Très bon article !',
                'note' => 5,
                'date' => now(),
                'id_utilisateur' => 2,
                'id_contenu' => 1,
            ]
        ]);
    }
}
