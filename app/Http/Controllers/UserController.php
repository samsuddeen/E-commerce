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
        return redirect()->back();
    
        
    }
    
       
    public function signin(Request $request){
       
        $request->validate([
                'email' =>'required|email',
                'password' =>'required|min:6'
            ]);
    
            //find user
            $user = User::where('email',$request->email)->first();
            if($user){
                if($user->password){
                    if(Hash::check($request->password, $user->password)){
                        Auth::login($user);
                        if($user->role =='admin'){
                            return redirect()->route('userdashboard');
                            }
                         else if ($user->role =='user'){
                             return redirect()->route('userdashboard');
                            }
                    else{
                           return redirect()->back()->with('error', 'Check Email , Password!');
                            }
                    }
                    $request->session()->flash('error', 'Please check Password');
                    return redirect()->back();
                } 
            }
            $request->session()->flash('error', 'User Not found');
            return redirect()->back();
        }
        public function logout(){
            if(Auth::check()){
                Auth::logout();
                return redirect()->route('login');
            }
            return redirect()->route('login');
        }

        public function show_user()
        {
            $user= User::all();
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



        
                
   

