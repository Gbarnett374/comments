<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    'body',
    'name',
    'parent_id'
   ];
   /**
    * getThreaded()
    * Gets comments grouped by parent_id and date created. 
    * @return [Collection/iterable] $comments 
    */
   public static function getThreaded() : iterable
   {
       $comments = Comment::all()->groupBy('parent_id', 'created_at');
       if (count($comments)) {
           $comments['root'] = $comments[''];
           unset($comments['']);
       }
       return $comments;
   }
  /**
   * getThreadCount
   * Recursively go up the tree and return the current number of nested comments. 
   * @param [int] $parent_id
   * @param [int] $count
   * @return $count
   */
   public static function getThreadCount(int $parentId, int $count) : int
   {
        $comment = Comment::find($parentId);
        if (!isset($comment->parent_id)) {
            return $count; 
        }
        $count += 1;
        $newParentId = $comment->parent_id;
        return Comment::getThreadCount($newParentId, $count);
   }
}
