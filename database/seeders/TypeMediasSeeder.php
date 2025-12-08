<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMedia;

class TypeMediasSeeder extends Seeder
{
    public function run(): void
    {
        TypeMedia::insert([
            ['nom_media' => 'Image'],
            ['nom_media' => 'Vidéo'],
            ['nom_media' => 'Audio'],
            ['nom_media' => 'PDF'],
        ]);
    }
}
