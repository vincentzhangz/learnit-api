<?php

namespace App\Http\Controllers\api;

use App\Course;
use App\CourseEnroll;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CourseEnrollController extends Controller
{
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
}
