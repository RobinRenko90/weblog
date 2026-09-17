<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'weblog_id'];

    // public function Weblog(){
    //     return $this->belongsToMany(Comment::class, 'comment_weblogs');
    // }
}
