<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'thread';
    protected $primaryKey = 'thread_id';
    protected  $casts = [
        'thread_id' => 'string',
        'forum_id' => 'string',
        'user_id' => 'string'
    ];

    public function forum(){
        return $this->belongsTo(Forum::class,'forum_id');
    }

    public function user(){
        return $this->hasMany(User::class,'user_id');
    }

}
