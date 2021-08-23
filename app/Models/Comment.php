<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    function GetTitle()
    {
      return $this->hasOne('App\Models\Post', 'id', 'postId');
    }
}
