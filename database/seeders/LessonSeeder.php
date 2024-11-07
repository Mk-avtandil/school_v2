<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Repositories\LessonRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'id' => 1,
            'course_id' => 1,
            'title' => 'Lesson 1',
            'Description' => 'To be',
            'published' => true,
        ]);

        Lesson::create([
            'id' => 2,
            'course_id' => 1,
            'title' => 'Lesson 2',
            'Description' => 'Present simple',
            'published' => true,
        ]);

        Lesson::create([
            'id' => 3,
            'course_id' => 2,
            'title' => 'Lesson 1',
            'Description' => 'checking level',
            'published' => true,
        ]);

        Lesson::create([
            'id' => 4,
            'course_id' => 2,
            'title' => 'Lesson 2',
            'Description' => 'Reading books',
            'published' => true,
        ]);

        Lesson::create([
            'id' => 5,
            'course_id' => 3,
            'title' => 'Lesson 1',
            'Description' => 'Structure data',
            'published' => true,
        ]);

        Lesson::create([
            'id' => 6,
            'course_id' => 3,
            'title' => 'Lesson 2',
            'Description' => 'OOP',
            'published' => true,
        ]);
    }
}
