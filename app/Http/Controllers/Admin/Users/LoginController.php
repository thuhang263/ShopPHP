<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function index()
    {
        //echo 123;
        return view('admin.users.login',[
            'title' => 'Dang nhap he thong'
        ]);
    }

    public function store(Request $request)
    {
        //dd($request -> input());
        $this ->validate($request,[
            'email' => 'required | email:filter',
            'password' => 'required'
        ]);
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return route('admin');

        }
        // tạo thông báo thành công hoặc lỗi
        Session::flash('error','Email or Password Sai');


        return redirect()->back();
    }
}
