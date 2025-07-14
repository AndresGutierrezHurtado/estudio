<?php

namespace Database\Seeders;

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
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'role_name' => 'student',
            ],
            [
                'role_id' => 2,
                'role_name' => 'administrative',
            ],
        ]);

        DB::table('users')->insert([
            [
                'user_id' => 1,
                'user_name' => 'Andrés',
                'user_lastname' => 'Gutiérrez Hurtado',
                'user_email' => 'andres52885241@gmail.com',
                'user_password' => Hash::make('12345678'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'user_name' => 'Wendy Alejandra',
                'user_lastname' => 'Navarro Arias',
                'user_email' => 'nwendy798@gmail.com',
                'user_password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('administratives')->insert([
            [
                'administrative_id' => 1,
                'user_id' => 1,
            ],
        ]);

        DB::table('students')->insert([
            [
                'student_id' => 1,
                'user_id' => 2,
                'student_institution' => 'Servicio Nacional de Aprendizaje',
                'student_birth' => '2006-04-15',
            ],
        ]);

        DB::table('calls')->insert([
            [
                'call_id' => 1,
                'call_name' => 'Apoyo alimenticio 2025',
                'call_description' => 'Apoyo alimenticio para estudiantes con puntaje de sisben bajo',
                'call_money' => 150000,
                'call_type' => 'mensual',
                'call_places' => 15,
                'call_start' => now()->subDays(5),
                'call_end' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
