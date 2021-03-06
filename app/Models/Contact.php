<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    function GetAdmin()
    {
      return $this->hasOne('App\Models\Admin', 'id', 'adminId');
    }
}
