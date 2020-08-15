<?php

use App\Assignment;
use App\AssignmentDetail;
use App\CourseEnroll;
use App\User;
use Illuminate\Database\Seeder;

class CourseEnrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignment = AssignmentDetail::all();
        for($i =0; $i<count($assignment); $i++){
            $enroll = new CourseEnroll;
            $enroll->user_id = $assignment->user_id;
            $enroll->course_id = User::all()->random(10)->first()->user_id;
            $enroll->save();
        }
    }
}
