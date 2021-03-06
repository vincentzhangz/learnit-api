<?php

namespace App\Http\Controllers\api;

use App\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    function register(Request $request){
        $course_id = $request->course_id;
        $deadline_at = $request->deadline_at;
        $assignment_title = $request->assignment_title;
        $assignment_id = uniqid();
        $assignment_file = $request->assignment_file;

        if( !$course_id || !$deadline_at || !$assignment_title || !$assignment_file)
            return json_encode(array('error'=>'invalid form data'));
        $assignment = new Assignment;
        $assignment->assignment_id =$assignment_id ;
        $assignment->course_id = $course_id;
        $assignment->deadline_at = $deadline_at;
        $assignment->assignment_title = $assignment_title;
        $assignment->assignment_file = $assignment_file;
        
        if($assignment->save())
            return json_encode(array("assignment_id"=>$assignment_id));
        return json_encode(array('error'=>'invalid saved'));
    }

    function getAssignment(){
        return Assignment::all();
    }

    function getAssingmentById(Request $request){
        return Assignment::where('assignment_id',$request->assignment_id)->first();
    }
}
