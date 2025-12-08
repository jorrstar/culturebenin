<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Langue;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        Langue::insert([
            ['nom_langue' => 'Français', 'code_langue' => 'fr', 'description' => 'Langue française'],
            ['nom_langue' => 'Anglais', 'code_langue' => 'en', 'description' => 'Langue anglaise'],
            ['nom_langue' => 'Fon', 'code_langue' => 'fon', 'description' => 'Langue locale du Bénin'],
        ]);
    }
}
