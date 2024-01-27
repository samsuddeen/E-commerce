<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Systemsetting;

class Systemsetting extends Model
{
    protected $table ='system_settings';
    protected $guarded =['id'];
    

    protected $fillable = [
        'name', 'slogan', 'phone', 'email', 'address', 'logo', 'title', 'subtitle', 'image'
    ];
}
