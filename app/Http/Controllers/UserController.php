<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\user;
use App\Systemsetting;

class usercontroller extends Controller
{
    public function signup (Request $request){
   
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password'=>'required|min:6',
            
        ]);
       
        $data=[
            'name'=>$request->fullname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),  
        ];
      
        user::insert($data);
        return redirect()->back()->with('success', 'Signup successful!');
    
        
    }
    
       
    public function signin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    // Find user
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Authentication successful
        Auth::login($user);

        $redirectRoute = ($user->role == 'admin' || $user->role == 'user') ? 'userdashboard' : 'home';

        return redirect()->route($redirectRoute)->with('success', 'Login successful!');
    }

    // Authentication failed
    $request->session()->flash('error', 'Invalid email or password');
    return redirect()->back();
}

    

public function logout()
{
    if (Auth::check()) {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }

    return redirect()->route('login');
}


        public function show_user()
        {
            $user= User::all();
            $data['systemdata'] = Systemsetting::find(1);
            $_SESSION['setting'] = $data['systemdata'];
            return view('backend.dashboard.user', compact('user'));
        }
    
        public function delete_user($id)
        {
            $user=User::find($id);
            
             $user->delete();
             return redirect()->back();
        }
        public function user_search(Request $request)
        {
            $searchterm =$request->search;
            $data['systemdata'] = Systemsetting::find(1);
            $_SESSION['setting'] = $data['systemdata'];
            $user=User::where('name','LIKE','%'.$searchterm.'%')
                ->orWhere('email','LIKE','%'.$searchterm.'%')->get();
               
                return view('backend.dashboard.user',compact('user'));
      
        }
    }



        
                
   

