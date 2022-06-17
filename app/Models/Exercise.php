<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public static $rules=[
        "name"=>"required",
        "email"=>"required",
        "profile"=>"required"
    ];
}
