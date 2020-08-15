<?php

use App\Category;
use App\Course;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        for($i =0; $i<20; $i++){
            $course = new Course;
            $course->course_id = uniqid();
            $course->user_id =  User::all()->random(10)->first()->user_id;
            $course->category_id = Category::all()->random(1)->first()->category_id;
            $course->course_title = $faker->randomElement(['Ipa','Ips',"Matematika","Penjasorkes","TIK"]);
            $course->max_enroll_student = rand(10,20);
            $course->max_learning_day = rand(30,40);
            $course->information = "Testing";
            $course->image = "https://i.stack.imgur.com/SFysv.jpg";
            $course->rating = rand(1,5);
            $course->created_at = $time->format('Y-m-d H:i:s');
            $course->save();
        }
    }
}
