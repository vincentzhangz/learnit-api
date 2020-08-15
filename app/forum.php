<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $primaryKey = 'forum_id';
    protected $hidden = ['thread','user'];
    protected  $casts = [
        'forum_id' => 'string',
        'course_id' => 'string',
    ];
    protected $appends = [
        'listthread','userforum'
    ];

    public function thread(){
        return $this->hasMany(Thread::class,'forum_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getUserForumAttribute(){
        return $this->user;
    }

    public function getListThreadAttribute(){
        return $this->thread;
    }

}
