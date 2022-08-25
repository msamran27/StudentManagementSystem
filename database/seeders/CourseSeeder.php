<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 20; $i++) { 
            Course::create([
                'course_code' => Str::random(6),
                'full_title' => $faker->randomElement(['chemistry', 'physics', 'math', 'pak studies', 'english', 'urdu', 'islamiat', 'science', 'computer', 'arbi']),
                'credit_hours' => $faker->randomElement([1, 4])
            ]);
        }
    }
}
