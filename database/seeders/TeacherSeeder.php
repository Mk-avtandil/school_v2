<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'id' => 1,
            'first_name' => 'Maksat',
            'last_name' => 'Maksatov',
            'birthday' => '12.04.1997',
            'phone' => '0702320433',
            'email' => 'maksat@gmail.com',
            'published' => true,
        ]);

        Teacher::create([
            'id' => 2,
            'first_name' => 'Vlad',
            'last_name' => 'Vladov',
            'birthday' => '15.03.2001',
            'phone' => '0707329033',
            'email' => 'vlad@gmail.com',
            'published' => true,
        ]);

        Teacher::create([
            'id' => 3,
            'first_name' => 'Chika',
            'last_name' => 'Sultanov',
            'birthday' => '15.03.2000',
            'phone' => '0709229153',
            'email' => 'chika@gmail.com',
            'published' => true,
        ]);
    }
}
