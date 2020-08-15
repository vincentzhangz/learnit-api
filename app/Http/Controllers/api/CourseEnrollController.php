<?php

namespace App\Http\Controllers\api;

use App\Assignment;
use App\Course;
use App\CourseEnroll;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CourseEnrollController extends Controller
{

    public function register(Request $request){
        if(!$request->course_id || !$request->user_id)
            return json_encode(array("error"=>'invalid format form'));
        $enroll = new CourseEnroll;
        $enroll->user_id = $request->user_id;
        $enroll->course_id = $request->course_id;
        if($enroll->save())
            return json_encode("sucess");
        else
            return json_encode(array("error"=>"failed to save"));
    }

    public function getCourse(Request $request){
        $user = User::where('user_id',$request->user_id)->first();
        if(!$user)
            return json_encode(array('error'=>'Wrong user Id'));
        
        $enroll = CourseEnroll::where('user_id',$request->user_id)->get();
        $listCourse = array();
        foreach($enroll as $singleEnroll){
            $single = Course::where('course_id',$singleEnroll->course_id)->get();
            array_push($listCourse,$single);
        }
        $user->listCourse = $listCourse;
        return $user;
    }

    public function getProgress(Request $request){
        $user = User::where('user_id',$request->user_id)->first();
        if(!$user)
            return json_encode(array('error'=>'Wrong user Id'));
        
        $enroll = CourseEnroll::where('user_id',$request->user_id)->get();
        $listAssignment = array();
        $listAnswer = array();
        foreach($enroll as $singleEnroll){
            $single_assignment = Assignment::where('course_id',$singleEnroll->course_id)->get();
            array_push($listAssignment,$single_assignment);
        }
        $user->listAssignment = $listAssignment;
        $user->listAnswer = $listAnswer;
        return $user;
    }
}
