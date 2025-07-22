<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'country_id' => 1,
                'country_name' => 'Colombia',
                'country_code' => 'COL',
            ],
            [
                'country_id' => 2,
                'country_name' => 'Panamá',
                'country_code' => 'PAN',
            ],
            [
                'country_id' => 3,
                'country_name' => 'Portugal',
                'country_code' => 'POR',
            ],
            [
                'country_id' => 4,
                'country_name' => 'España',
                'country_code' => 'ESP',
            ],
        ]);

        DB::table('competitors')->insert([
            [
                'competitor_id' => 1,
                'competitor_name' => 'Maria',
                'competitor_lastname' => 'Pajon',
                'competitor_description' => 'Colombiana campeona de torneos de BMX',
                'competitor_birthdate' => '1990-06-10',
                'country_id' => 1
            ],
            [
                'competitor_id' => 2,
                'competitor_name' => 'Cristiano',
                'competitor_lastname' => 'Ronaldo',
                'competitor_description' => 'Máximo goleador de la historia del fútbol',
                'competitor_birthdate' => '1990-06-10',
                'country_id' => 3
            ],
            [
                'competitor_id' => 3,
                'competitor_name' => 'Ilia',
                'competitor_lastname' => 'Topuria',
                'competitor_description' => 'Campeón de MMA en la UFC',
                'competitor_birthdate' => '1990-06-10',
                'country_id' => 4
            ],
        ]);

        DB::table('medals')->insert([
            [
                'medal_id' => 1,
                'medal_type' => 'gold',
                'medal_sport' => 'MMA',
                'country_id' => 4
            ],
            [
                'medal_id' => 2,
                'medal_type' => 'gold',
                'medal_sport' => 'EuroCup',
                'country_id' => 3
            ]
        ]);

        DB::table('medal_competitors')->insert([
            [
                'medal_id' => 1,
                'competitor_id' => 3,
            ],
            [
                'medal_id' => 2,
                'competitor_id' => 2,
            ]
        ]);
    }
}
