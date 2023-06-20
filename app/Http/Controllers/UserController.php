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

    public function login(Request $request){
        $this->validate($request,
        [
            'username'=>'required',
            'password'=> 'required',
        ]);
        if($request->input('username') == '54064' && $request->input('password') == '54064'){
            return redirect()->route('admin');
        }else{
            Session()->flash('error','Sai tên đăng nhập hoặc mật khẩu');
            return redirect()->back();
        }
    }

}