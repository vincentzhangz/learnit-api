<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $hidden = ['user'];
    protected $appends = [
        'usercomment',
    ];
    protected $casts = [
        'thread_id' => 'string',
        'user_id' => 'string',
    ];

    public function getUserCommentAttribute(){
        return $this->user;
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');    
    }
    public function thread(){
        return $this->hasOne(User::class,'thread_id');    
    }

}
