<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Systemsetting;

class CartController extends Controller
{
    public function show_cart(){
    $data['system'] = Systemsetting::find(1);
    $_SESSION['setting'] = $data['system'];        
        return view('frontend.showcart');
    }
}
