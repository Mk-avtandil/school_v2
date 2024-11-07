<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'id' => 1,
            'first_name' => 'Avtandil',
            'last_name' => 'Kurbanov',
            'birthday' => '02.04.1997',
            'address' => 'Bishkek city',
            'phone' => '0704323433',
            'email' => 'avtandilkgg@gmail.com',
            'published' => true,
        ]);

        Student::create([
            'id' => 2,
            'first_name' => 'Dastan',
            'last_name' => 'Kushnazarov',
            'birthday' => '15.03.1998',
            'address' => 'Jalal-Abad',
            'phone' => '0777329033',
            'email' => 'dastan@gmail.com',
            'published' => true,
        ]);

        Student::create([
            'id' => 3,
            'first_name' => 'Malika',
            'last_name' => 'Malikova',
            'birthday' => '15.03.2007',
            'address' => 'Vostok 5',
            'phone' => '0779829053',
            'email' => 'malika@gmail.com',
            'published' => true,
        ]);
    }
}
