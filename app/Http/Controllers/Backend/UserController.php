<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function passwordChange( Request $request )
    {
        $id = Auth::id();
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        $newpassword_ag = $request->input('newpassword_ag');
        if($newpassword != $newpassword_ag){
            return view('backend.user.resetpassword',['error' =>'两次输入的密码不一致！']);
        }

        $res = User::where('id',$id)->select('password')->first();

        if(!Hash::check($oldpassword, $res->password)){
            return view('backend.user.resetpassword',['error' =>'原密码错误！']);
        }
        $update = array(
          'password'  =>bcrypt($newpassword),
        );
        $result = User::where('id',$id)->update($update);
        if($result){
            return view('backend.user.resetpassword',['success' => '修改成功！']);
        }else{
            return view('backend.user.resetpassword',['error' =>'密码修改错误，请稍后重试！']);
        }
    }
}