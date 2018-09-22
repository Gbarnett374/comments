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
}
