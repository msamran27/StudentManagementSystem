<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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
            Student::create([
                'full_name' => $faker->name(),
                'cnic' => $faker->numberBetween(3130411111111, 3130499999999),
                'date_of_birth' => $faker->dateTimeBetween('-30 years', '-10 years'),
                'age' => $faker->randomElement([15, 30]),
                'gender' => $faker->randomElement(['male', 'female', 'other'])
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            DB::table('course_student')->insert([
                'student_id' => Student::all()->random()->id, 
                'course_id' => Course::all()->random()->id
            ]);
        }
    }
}
