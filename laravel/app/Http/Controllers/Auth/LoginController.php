<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin(){
        return view('auth/login');
    }
    public function postLogin(Request $request){
        // dd($request->all());
        //kiểm tra dữ liệu đầu vào
        $rules = [
            'email'=> 'required|email',
            'password'=> 'required'
        ];

        $messages = [
            'email.required' => 'Mời bạn nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mời bạn nhập mật khẩu',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        // dd($validator);
        if($validator->fails()){
            return redirect('login')->withErrors($validator);
        }else{
            //đón dữ liệu từ bên trang login chuyển sang
            $email = $request->input('email');
            $password = $request->input('password');
            // dd($email,$password);   
            //kiểm tra đăng nhập
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect('test');
            }else{
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
                return redirect('login');
            }
        }
    }
}
