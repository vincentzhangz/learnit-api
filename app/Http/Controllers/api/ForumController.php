<?php

namespace App\Http\Controllers\api;

use App\Forum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function register(Request $request){
        $user_id = $request->user_id;
        $course_id = $request->course_id;
        $forum_title = $request->forum_title;
        $forum_content = $request->forum_content;
        if(!$user_id || !$course_id || !$forum_title || !$forum_content)
            return json_encode(array('error'=>'missing form data'));
        $forum = new Forum;
        $forum->forum_id = uniqid();
        $forum->forum_title = $forum_title;
        $forum->course_id = $course_id;
        $forum->forum_content = $forum_content;
        if($forum->save())
            return json_encode("success");
        else
            return json_encode(array('error'=>'invalid form data for insert'));
    }

    public function getAllForum(){
        return Forum::all();
    }

    public function getForumById(Request $request){
        return Forum::where('forum_id',$request->forum_id)->first();
    }

    public function getForumByCourse(Request $request){
        return Forum::where('course_id',$request->course_id)->first();
    }
}
