<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['name', 'user_id', 'comment_id', 'reply'];

}
