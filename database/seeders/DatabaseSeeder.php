<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CourseSeeder::class);

        DB::table('twill_users')->insert([
            'published' => 1,
            'created_at' => now(),
            'name' => 'Test Admin',
            'email' => 'admin@mail.ru',
            'role' => 'SUPERADMIN',
            'password' => Hash::make('admin123'),
            'registered_at' => now(),
        ]);
    }
}
