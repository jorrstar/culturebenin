<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsSeeder extends Seeder
{
    public function run(): void
    {
        Region::insert([
            ['nom_region' => 'Atlantique', 'description' => 'Sud du Bénin', 'population' => 2500000, 'superficie' => 3233.22, 'localisation' => 'Sud'],
            ['nom_region' => 'Borgou', 'description' => 'Nord-Est', 'population' => 1400000, 'superficie' => 25950, 'localisation' => 'Nord'],
            ['nom_region' => 'Ouémé', 'description' => 'Est du Bénin', 'population' => 1900000, 'superficie' => 1864, 'localisation' => 'Sud-Est'],
        ]);
    }
}
