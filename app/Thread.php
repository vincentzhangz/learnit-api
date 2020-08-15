<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'thread';
    protected $primaryKey = 'thread_id';
    protected $hidden = ['user','comment'];
    protected  $casts = [
        'thread_id' => 'string',
        'forum_id' => 'string',
        'user_id' => 'string'
    ];
    protected $appends = [
        'userthread','commentthread'
    ];

    public function forum(){
        return $this->belongsTo(Forum::class,'forum_id');
    }
    public function getUserThreadAttribute(){
        return $this->user;
    }
    public function getCommentThreadAttribute(){
        return $this->comment;
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comment(){
        return $this->hasOne(Comment::class,'thread_id');
    }
}
