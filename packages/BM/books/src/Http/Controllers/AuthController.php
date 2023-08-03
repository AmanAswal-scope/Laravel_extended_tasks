<?php

namespace BM\Books\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use BM\Books\Models\Users;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function dashboard(Request $request)
    {
        return view('books::pages.index',["title"=>"Dashboard"]);
    }




    public function login(Request $request)
    {
        return view('books::user.login');
    }



    public function loginPost(Request $request)
    {
        $found_user =Users::where('username',$request->username)->get();
        $errors=[];
        if (Count($found_user ) > 0){
            if (Auth::attempt(['username' =>$request->username, 'password' => $request->password])) {
                  return redirect()->intended('dashboard');
            }  else{
                $errors[]=["msg"=>"Username/Password is incorrect!"];
            }         
        }else{
            $errors[]=["msg"=>"Username not found"];          
        }
        return redirect()->back()->withErrors($errors);
    }





    public function register(Request $request)
    {
        return view('books::user.register');
    }

    
    
    
    
    public function registration(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:9',
        ]);
        $hash_password = password_hash($request->get("password"),PASSWORD_DEFAULT);
        $request->request->set("password",$hash_password);
        $user = new Users;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();
        
        return redirect(route('login'));
    }





    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
