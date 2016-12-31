<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAccountRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function getEdit($id)
    {
        if(Auth::user()->id != $id)
        {
            return redirect('/');
        }
        $acc= DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        return view('editAccount', ['info'=>$acc]);
    }
    public function postEdit(EditAccountRequest $request,$id){
        DB::table('users')
            ->where('id', $id)
            ->update([
                'email' => ''
            ]);
        $this->validate($request,
            ['txtEmail' => 'unique:users,email'],
            ['txtEmail.unique'=> 'Email đã tồn tại']
        );
        $data = $request->all();
        $user = User::find($id);
        if(!Hash::check($data['txtOldPassword'], $user->password)){
            //return redirect()->route('getEditAccount')->with(['flash_mesage'=>'Sai mật khẩu']);
            return redirect()->back()->withErrors('Sai mật khẩu');
        }
        else{
            $name=$request->txtname;
            $password=Hash::make($request->txtPassword);
            $email=$request->txtEmail;
            $level=$user->level;
            $token=$request->_token;
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $name,'password'=>$password, 'email' => $email, 'level' => $level,'remember_token'=>$token
                ]);
            return redirect()->back()->with(['flash_mesage'=>'Cập nhật thành công']);
        }
    }
}
