<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_group extends Model
{
    protected $fillable = [
        'name','user_id','category',
    ];
}
