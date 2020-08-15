<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{


    public function getThreadByForumId(Request $request){
        return Thread::where('forum_id',$request->forum_id)->get();
    }

    public function updateIsCorrect(Request $request){
        $data = $this->getAllThreadById($request);
        $data->is_correct = $request->is_correct;
        if($data->save()){
            return json_encode(array("status"=>"update success",
            "thread_id"=>$request->thread_id
            ));
        }
        
    }

    public function register(Request $request){
        $thread = new Thread;
        $thread_id = uniqid();
        $thread->thread_id = $thread_id;
        $thread->forum_id = $request->forum_id;
        $thread->title = $request->title;
        $thread->user_id = $request->user_id;
        $thread->reply_content = $request->reply_content;
        $thread->is_correct = $request->is_correct;
        if($thread->is_correct === 'true' || $thread->is_correct === 'false' || $thread->is_correct === 'netral')
        {
            $thread->save();
            return json_encode(array("thread_id"=>$thread_id));
        }else
            return json_encode(array('error'=>'error!'));


    }
    public function getAllThread(){
        return Thread::all();
    }
    
    public function getAllThreadById(Request $request){
        return Thread::where('thread_id',$request->thread_id)->first()->user;
    }
}
