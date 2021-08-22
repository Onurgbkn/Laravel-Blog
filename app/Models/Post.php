<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function GetCategory()
    {
      return $this->hasOne('App\Models\Category', 'id', 'categoryId');
    }

    function GetAdmin()
    {
      return $this->hasOne('App\Models\Admin', 'id', 'adminId');
    }
}
