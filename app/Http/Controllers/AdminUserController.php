<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use Hash;
use DB;

class AdminUserController extends Controller
{
    public function getList()
    {
        $user = DB::table('users')
            ->orderby('id','ASC')
            ->get();
        return view('adminListUser',['users'=>$user]);
    }
    public function getAdd()
    {
        return view('register');
    }
    public function getNoti()
    {
        return view('noti');
    }
    public function postAdd(RegisterRequest $request)
    {
        $Name=$request->txtname;
        $Password=Hash::make($request->txtPassword);
        $Email=$request->txtEmail;
        $level=0;
        $token=$request->_token;
        DB::table('users')->insert([
            'Name' => $Name, 'Email' => $Email,'Password' => $Password,  'level' =>$level,'remember_token'=>$token
        ]);
        return redirect()->route('getNoti')->with(['flash_mesage'=>'Đăng kí thành công']);
    }
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(LoginRequest $request)
    {
        $login=array(
            'email'=>$request->txtEmail,
            'password'=>$request->txtPassword,
            'level'=>1
        );
        if(Auth::attemp($login)){
            echo"Thành công";
        }
        else{
            echo"Thất bại";
        }
    }
    public function getDelete($iduser)
    {
        DB::table('users')
            ->where('users.id', '=', $iduser)
            ->delete();
        return redirect()->route('getListUser')->with(['flash_mesage'=>'Xóa thành công']);
    }
    public function getEdit($iduser)
    {
        $user= DB::table('users')
            ->where('users.id', '=', $iduser)
            ->get();
        return view('adminEditUser',['users'=>$user]);
    }
    public function postEdit(EditUserRequest $request,$iduser)
    {
        $name=$request->txtUserName;
        $emal=$request->txtUserEmail;
        $level=$request->txtUserLevel;
        DB::table('users')
            ->where('id', $iduser)
            ->update([
                'name' => $name, 'email' => $emal, 'level' => $level
            ]);
        return redirect()->route('getListUser')->with(['flash_mesage'=>'Sửa thành công']);
    }
}
