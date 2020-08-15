<?php

namespace App\Http\Controllers\api;

use App\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    function register(Request $request){
        $user_id = $request->user_id;
        $course_id = $request->course_id;
        $deadline_at = $request->deadline_at;
        $assignment_title = $request->assignment_title;
        $assignment_file = $request->assignment_file;
        

    }

    function getAssignment(){
        return Assignment::all();
    }

    function getAssingmentById(Request $request){
        return Assignment::where('assignment_id',$request->assignment_id)->first();
    }
}
