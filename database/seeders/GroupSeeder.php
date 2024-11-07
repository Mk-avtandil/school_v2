<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'course_id' => 1,
            'title' => 'A1 level',
            'description' => 'Morning group',
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
            'published' => true,
        ]);

        Group::create([
            'course_id' => 1,
            'title' => 'A2 level',
            'description' => 'Morning group',
            'start_time' => '10:20:00',
            'end_time' => '12:20:00',
            'published' => true,
        ]);

        Group::create([
            'course_id' => 2,
            'title' => 'B1 level',
            'description' => 'New spanish group',
            'start_time' => '18:00:00',
            'end_time' => '20:00:00',
            'published' => true,
        ]);

        Group::create([
            'course_id' => 3,
            'title' => 'PHP',
            'description' => 'with laravel',
            'start_time' => '18:00:00',
            'end_time' => '22:00:00',
            'published' => true,
        ]);
    }
}
