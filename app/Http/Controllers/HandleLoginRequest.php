<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;

class HandleLoginRequest extends Controller
{
    public function LoginAttempt(Request $request){
        
        if(Auth::guard("admins")->attempt($request->except("_token"))){
            $data = Auth::guard('admins')->user();
            if(!empty($data)){
                return redirect()->route('dashboard');
            }
        }else{
            dd("wrong");
        }
    }

    public function logout(){

        if(Auth::check()){
            Auth::logout();
            return redirect()->route("login");
        }

        if(Auth::guard("admins")->check()){
          Auth::guard("admins")->logout();
            return redirect()->route("login");
          }
            

        if(Auth::guard("author")->check()){
           Auth::guard("author")->logout();
            return redirect()->route("login");
    
        }
        
    }
}
