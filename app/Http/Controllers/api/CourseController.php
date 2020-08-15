<?php

namespace App\Http\Controllers\api;

use App\Course;
use App\CourseDetail;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function register(Request $request){
        $teacher = $request->user_id;
        $category = $request->category_id;
        $title = $request->course_title;
        $maxEnroll = $request->max_enroll_student;
        $maxLearning = $request->max_learning_day;
        if(!$teacher || !$category || !$title || !$maxEnroll || !$maxLearning)
            return json_encode(array("error"=>"Error invalid data"));
        else if(User::where(['user_id', '=', $teacher])->first()->user_role == 'student')
            return json_encode(array("error"=>"Invalid Role"));
        $course = new Course;
        $course->course_id = uniqid();
        $course->category_id = $category;
        $course->course_title = $title;
        $course->user_id = $teacher;
        $course->max_enroll_student = $maxEnroll;
        $course->max_learning_dat = $maxLearning;
        if($course->save())
            return json_encode("success");
        else
            return json_encode(array("error"=>"Error invalid data"));
    }

    public function registerMaterial(Request $request){
        if(!$request->course_id
        || !$request->course_title
        || !$request->course_content)
            return json_encode(array("error"=>"Error invalid data"));
        $detailCourse = new CourseDetail;
        $detailCourse->material_id = uniqid();
        $detailCourse->course_id = $request->course_id;
        $detailCourse->course_title = $request->course_title;
        $detailCourse->course_content = $request->course_content;
        if($detailCourse->save())
            return json_encode("success");
        else
            return json_encode(array("error"=>"Error invalid data"));
    }

    public function getCourse(){
        return Course::all();
    }

    public function getCourseDetail(){
        return CourseDetail::all();
    }

    public function getCourseDetailbyId(Request $request){
        $result = CourseDetail::where('material_id','=',$request->material_id)->first();
        $result->content = $result->course_content;
        return $result;
    }

    public function getCourseById(Request $request){
        return Course::where('course_id','=',$request->course_id)->first();
    }
}
