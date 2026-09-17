<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Weblog extends Model
{
   use HasFactory;

   protected $fillable = ['title', 'description', 'user_id'];

   protected $casts = [
      'created_at',
      'updated_at',
      'deleted_at',
   ];

   function comments(): BelongsToMany 
   {
      return $this->belongsToMany(Comment::class, 'comment_weblogs');
   }
}
