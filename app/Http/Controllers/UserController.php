<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('user');
    }

    public function loginView(){
        return view('auth.login', ['title'=>'Đăng nhập']);
    }

    public function registerView(){
        return view('auth.register', ['title'=>'Đăng Ký']);
    }

    public function loginSV(Request $request){
        $this->validate($request,
        [
            'username'=>'required',
            'password'=> 'required',
        ]);
        if($request->input('username') == '21864' && $request->input('password') == '21864'){
            return redirect()->route('admin');
        }else{
            Session()->flash('error','Sai tên đăng nhập hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function login(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email:filter',
            'password'=> 'required',
        ]);
        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
            return redirect()->route('admin');
        }
        Session()->flash('error','Sai tên đăng nhập hoặc mật khẩu');
        return redirect()->back();
    }

    public function register (){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->route('admin');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}