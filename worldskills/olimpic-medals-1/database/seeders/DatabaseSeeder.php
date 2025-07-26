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
                'team_name' => 'Bolivia',
                'team_code' => 'BOL',
                'team_image' => '/storage/teams/2.jpg'
            ],
            [
                'team_id' => 3,
                'team_name' => 'Argentina',
                'team_code' => 'ARG',
                'team_image' => '/storage/teams/3.jpg'
            ]
        ]);

        DB::table('plays')->insert([
            [
                'play_id' => 1,
                'play_date' => now()->subDays(2),
                'play_start' => '10:00:00'
            ],
            [
                'play_id' => 2,
                'play_date' => now()->subDays(1),
                'play_start' => '10:00:00'
            ],
            [
                'play_id' => 3,
                'play_date' => now(),
                'play_start' => '10:00:00'
            ],
        ]);

        DB::table('play_teams')->insert([
            [
                'play_id' => 1,
                'team_id' => 1,
                'team_goals' => 1,
                'team_local' => false,
            ],
            [
                'play_id' => 1,
                'team_id' => 2,
                'team_goals' => 2,
                'team_local' => true,
            ],
            [
                'play_id' => 2,
                'team_id' => 1,
                'team_goals' => 3,
                'team_local' => false,
            ],
            [
                'play_id' => 2,
                'team_id' => 3,
                'team_goals' => 1,
                'team_local' => true,
            ],
            [
                'play_id' => 3,
                'team_id' => 3,
                'team_goals' => 4,
                'team_local' => false,
            ],
            [
                'play_id' => 3,
                'team_id' => 2,
                'team_goals' => 2,
                'team_local' => true,
            ],
        ]);
    }
}
