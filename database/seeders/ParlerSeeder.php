<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parler;

class ParlerSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('parler')->insert([
            ['id_region' => 1, 'id_langue' => 1],
            ['id_region' => 1, 'id_langue' => 3],
            ['id_region' => 2, 'id_langue' => 1],
        ]);
    }
}
