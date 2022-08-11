<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginView(){

        return view('admin.auth.login');

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check=User::where('email',$request->email)->first();

        if($check){
            if($check->status == 'active'){
                $login = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];

                    if (Auth::attempt($login)) {
                        $request->session()->regenerate();

                        Session::put('email',$check->email);
                        Session::put('name',$check->name);
                        Session::put('id_users',$check->id);
                        Session::put('id_privileges',$check->id_privileges);

                        return redirect()->intended('dashboard');
                    }else{
                        return back()->with('message','somethings else please try again')->with('message_type','danger');
                    }
            }else{
                return back()->with('message','user not active')->with('message_type','danger');
            }
        }else{
           
            return back()->with('message','user not found')->with('message_type','danger');
                
        }
    }

    public function logout()
    {
        Auth::logout();
     
        Session::flush();
     
        return redirect('login-v')->with('message','Thanks !!!')->with('message_type','primary');
    }
}
