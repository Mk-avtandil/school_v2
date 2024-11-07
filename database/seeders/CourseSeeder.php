<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'id' => 1,
            'title' => 'English',
            'description' => 'American English',
            'price' => 10000,
            'published' => true,
        ]);

        Course::create([
            'id' => 2,
            'title' => 'Spanish',
            'description' => 'New course',
            'price' => 12000,
            'published' => true,
        ]);

        Course::create([
            'id' => 3,
            'title' => 'Backend',
            'description' => 'bootcamp course',
            'price' => 15000,
            'published' => true,
        ]);
    }
}
