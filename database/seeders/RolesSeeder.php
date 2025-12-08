<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['nom_role' => 'Administrateur'],
            ['nom_role' => 'Modérateur'],
            ['nom_role' => 'Auteur'],
            ['nom_role' => 'Utilisateur'],
        ]);
    }
}
