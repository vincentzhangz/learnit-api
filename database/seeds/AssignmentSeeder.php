<?php

use App\Assignment;
use App\AssignmentDetail;
use App\Course;
use App\User;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        for($i =0; $i<10; $i++){
            $assignment = new Assignment();
            $assignmentId = uniqid();
            $assignment->assignment_id = $assignmentId;
            $assignment->course_id = Course::all()->random(1)->first()->course_id;
            $assignment->deadline_at = $time->format('Y-m-d H:i:s');
            $assignment->assignment_title = "lorem";
            $assignment->assignment_file = "hwe";
            $assignment->save();
            for($j =0; $j<3; $j++){
                $detail = new AssignmentDetail;
                $detail->assignment_id = $assignmentId;
                $detail->user_id = User::all()->random(1)->first()->user_id;
                $detail->assignment_upload_file = "DONEE";
                if(rand(0,1) == 1)
                    $detail->assignment_score = 80;
                $detail->save();
            }
        }
    }
}
