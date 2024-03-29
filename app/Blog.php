<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $table = 'blogs';

    protected $fillable = [
      'name', 'creator', 'created_at',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class,'blog_id');
    }

}