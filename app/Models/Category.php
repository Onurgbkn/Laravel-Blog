<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    function GetCount()
    {
      return $this->hasMany('App\Models\Post', 'categoryId', 'id')->count();
    }


}
