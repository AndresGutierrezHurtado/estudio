<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'role_name' => 'usuario',
            ],
            [
                'role_id' => 2,
                'role_name' => 'administrador'
            ]
        ]);

        // Users
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'user_name' => 'Andres Gutierrez',
                'user_email' => 'andres52885241@gmail.com',
                'user_password' => Hash::make('12345678'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'user_name' => 'Wendy Navarro',
                'user_email' => 'nwendy798@gmail.com',
                'user_password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Rooms
        DB::table('rooms')->insert([
            [
                'room_id' => 1,
                'room_name' => 'Salon 101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => 2,
                'room_name' => 'Salon 102',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Schedules
        DB::table('schedules')->insert([
            [
                'schedule_id' => 1,
                'room_id' => 1,
                'schedule_day' => 1,
                'schedule_start' => '12:00:00',
                'schedule_end' => '12:00:00',
            ]
        ]);
    }
}
