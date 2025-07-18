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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Andres Gutierrez',
            'email' => 'andres52885241@gmail.com',
        ]);

        DB::table('countries')->insert([
            [
                'country_id' => 1,
                'country_name' => 'colombia',
                'country_code' => 'COL'
            ],
            [
                'country_id' => 2,
                'country_name' => 'panamá',
                'country_code' => 'PAN'
            ],
            [
                'country_id' => 3,
                'country_name' => 'venezuela',
                'country_code' => 'VEN'
            ],
        ]);

        DB::table('medals')->insert([
            [
                'medal_id' => 1,
                'medal_type' => 'gold',
                'medal_sport' => 'Desarrollo web',
                'medal_year' => 2025,
                'country_id' => 1
            ],
            [
                'medal_id' => 2,
                'medal_type' => 'bronze',
                'medal_sport' => 'Soccer',
                'medal_year' => 2025,
                'country_id' => 2
            ],
        ]);
    }
}
