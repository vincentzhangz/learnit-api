<?php

use App\Course;
use App\Forum;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i =0; $i<10;$i++){
            $forum = new Forum;
            $forum->forum_id = uniqid();
            $forum->course_id = Course::all()->random(10)->first()->course_id;
            $forum->user_id = User::all()->random(10)->first()->user_id;
            $forum->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $forum->content = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem sint maiores veritatis consectetur voluptatum laudantium minus debitis accusantium eos dicta animi, alias sit tenetur eveniet repellat error magnam provident culpa.';
        }
    }
}
