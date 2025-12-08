<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateur::insert([
            [
                'nom' => 'Admin',
                'prenom' => 'Root',
                'email' => 'admin@example.com',
                'mot_de_passe' => bcrypt('admin123'),
                'sexe' => 'M',
                'date_inscription' => now(),
                'date_naissance' => '1990-01-01',
                'statut' => 'actif',
                'photo' => 'default.png',
                'id_role' => 1,
                'id_langue' => 1,
            ],
            [
                'nom' => 'Jean',
                'prenom' => 'Dupont',
                'email' => 'jean@example.com',
                'mot_de_passe' => bcrypt('password'),
                'sexe' => 'M',
                'date_inscription' => now(),
                'date_naissance' => '1997-05-17',
                'statut' => 'actif',
                'photo' => 'default.png',
                'id_role' => 3,
                'id_langue' => 1,
            ],
        ]);
    }
}
