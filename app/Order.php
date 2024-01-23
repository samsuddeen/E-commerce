<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\product;

class Order extends Model
{
    protected $guarded = ['id'];


    public function users(){

        return $this->hasOne(User::class,'id','user_id');
    }

    public function product(){
        return $this->hasOne(product::class,'id','product_id');
    }

}
