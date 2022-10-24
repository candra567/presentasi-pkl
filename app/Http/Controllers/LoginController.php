<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersMessage;
class LoginController extends Controller
{
    public function index()
    {
        return view('users.login');
    }
    public function store(Request $request)
    {
        if($request->method()!=='POST'){
            return redirect('/');
        }
        $users_message=$request->username;
        $users_password=$request->password;
        $users_hash=$request->username.rand(20,100);
        $users_has=UsersMessage::where('name_users',$users_message)->first();
        if($users_has){
            if (password_verify($users_password,$users_has->password_users)) {
                session([
                    'id_users'=>$users_has->id_users,
                    'login'=>true
                     ]);
               return redirect('/message')->with('join_success','Anda berhasil bergabung');
            }
            else{
                   return redirect()->back()->with('join_failed','Users sudah ada gunakan user lain or password incorecct !');
               }
        }
        else{
           $save= UsersMessage::create([
             'name_users'=>$users_message,
             'password_users'=>password_hash($users_password,PASSWORD_DEFAULT),
             'hash_users'=>$users_hash
            ]);
            session([
                'id_users'=>$save->id,
                'login'=>true
           ]);
           return redirect('/message')->with('join_success','Anda berhasil bergabung');

        }
    }
    public function destroy()
    {
        session()->flush();
        return redirect('/');
    }
}
