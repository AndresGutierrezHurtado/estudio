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
        DB::table('teams')->insert([
            [
                'team_id' => 1,
                'team_name' => 'Colombia',
                'team_code' => 'COL',
                'team_image' => '/storage/teams/1.jpg'
            ],
            [
                'team_id' => 2,
                'team_name' => 'Panamá',
                'team_code' => 'PAN',
                'team_image' => '/storage/teams/2.jpg'
            ]
        ]);

        DB::table('plays')->insert([
            [

                'play_id' => 1,
                'play_date' => '2025/07/24',
                'play_start' => '12:01',
            ]
        ]);

        DB::table('play_teams')->insert([
            [

                'play_id' => 1,
                'team_id' => 1,
                'team_goals' => 2,
                'team_local' => 1,
            ],
            [

                'play_id' => 1,
                'team_id' => 2,
                'team_goals' => 1,
                'team_local' => 0,
            ],
        ]);
    }
}
