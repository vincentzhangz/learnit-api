<?php

use App\Course;
use App\Forum;
use App\Thread;
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
            $forum_id = uniqid();
            $forum = new Forum;
            $forum->forum_id = $forum_id;
            $forum->course_id = Course::all()->random(10)->first()->course_id;
            $forum->user_id = User::all()->random(10)->first()->user_id;
            $forum->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $forum->content = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem sint maiores veritatis consectetur voluptatum laudantium minus debitis accusantium eos dicta animi, alias sit tenetur eveniet repellat error magnam provident culpa.';
            $forum->save();
            for($j =0; $j<3; $j++){
                $thread = new Thread;
                $thread->thread_id =uniqid();
                $thread->forum_id = $forum_id;
                $thread->user_id = User::all()->random(10)->first()->user_id;
                $thread->reply_content = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem sint maiores veritatis consectetur voluptatum laudantium minus debitis accusantium eos dicta animi, alias sit tenetur eveniet repellat error magnam provident culpa.';
                $thread->iscorrect = $faker->randomElement(['true','netral','false']);
                $thread->save();
            }
        }
    }
}
