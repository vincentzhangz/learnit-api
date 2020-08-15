<?php

namespace App\Http\Controllers\api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function register(Request $request){
        $user_id = $request->user_id;
        $thread_id = $request->thread_id;
        $reply_content = $request->reply_content;
        if(!$user_id || !$thread_id || !$reply_content)
            return json_encode(array('error'=>'missing form data'));
        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->thread_id = $thread_id;
        $comment->reply_content = $reply_content;
        if($comment->save())
            return json_encode("success");
        else
            return json_encode(array('error'=>'insert error'));
    }

    public function getAllComment(){
        return Comment::all();
    }

    public function getAllCommentByThreadId(Request $request){
        return Comment::where('thread_id',$request->thread_id)->get();
    }
    
}
