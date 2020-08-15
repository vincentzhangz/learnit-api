<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $casts = [
        'category_id' => 'string',
    ];
    public function course(){
        return $this->hasMany(Course::class,'category_id');
    }
}
