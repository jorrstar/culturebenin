<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    $this->call([
        RolesSeeder::class,
        LanguesSeeder::class,
        RegionsSeeder::class,
        UtilisateursSeeder::class,
        TypeContenusSeeder::class,
        ContenusSeeder::class,
        TypeMediasSeeder::class,
        MediasSeeder::class,
        CommentairesSeeder::class,
        ParlerSeeder::class,
    ]);
}

}
