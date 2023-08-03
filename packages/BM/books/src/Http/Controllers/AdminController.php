<?php

namespace BM\Books\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use BM\Books\Models\Users;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{






    public function dashboard(Request $request)
    {
        return view('books::pages.index',["title"=>"Dashboard"]);
    }








    public function login(Request $request)
    {
        return view('books::admin.login');
    }









    public function loginPost(Request $request){
        $found_user =Users::where('username',$request->username)->get();
        $errors=[];
        if (Count($found_user ) > 0){
            if (auth()->attempt(['username' =>$request->username, 'password' => $request->password, 'user_type'=> 'admin'])) {
                  return redirect()->intended('admin/dashboard');
            }  else{
                $errors[]=["msg"=>"Username/Password is incorrect!"];
            }         
        }else{
            $errors[]=["msg"=>"Username not found"];          
        }
        return redirect()->back()->withErrors($errors);
    }







    public function logout(Request $request){
        Auth::logout();
        return redirect(route('home'));
    }
}
