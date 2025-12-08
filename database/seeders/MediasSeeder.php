<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediasSeeder extends Seeder
{
    public function run(): void
    {
        Media::insert([
            [
                'chemin' => 'medias/demo.jpg',
                'description' => 'Image illustrant un article',
                'id_contenu' => 1,
                'id_type_media' => 1,
            ],
        ]);
    }
}
