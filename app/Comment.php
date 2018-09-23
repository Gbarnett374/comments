<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    'body',
    'name',
    'parent_id',
    'created_at',
   ];

   public static function getThreaded() {
       $comments = Comment::all()->groupBy('parent_id', 'created_at');
       if (count($comments)) {
           $comments['root'] = $comments[''];
           unset($comments['']);
       }
       return $comments;
   }
}
