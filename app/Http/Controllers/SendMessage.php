<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersMessage;
class SendMessage extends Controller
{
    public function index($hash){
        $data_user=UsersMessage::where('hash_users',$hash)->first();
        if ($data_user) {
            return view('users.send-message',[
                'id_users_message'=>$data_user->id_users
            ]);
        }
        else{
            return view('not-found.index-not',[
                'message'=>'Sorry User Not Found'
            ]);
        }
    }
}
