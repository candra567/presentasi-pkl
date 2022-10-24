<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersMessage;
use App\Models\MessageModel;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user=UsersMessage::where('id_users',session('id_users'))->first();
        $data_message=MessageModel::join('table_users_message','table_message.id_users_message','table_users_message.id_users')->orderBy('id_message','desc')->where('id_users',session('id_users'))->paginate(10);
            return view('users.message',[
                'users'=>$data_user,
                'message'=>$data_message
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $id_users_message=(int)$request->id_users_message;
       $content_message=$request->content_message;
       $hash_message=rand(1,1000);
       MessageModel::create([
          'id_users_message'=>$id_users_message,
          'content_message'=>$content_message,
          'hash_message'=>$hash_message
       ]);
       return redirect('/success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $response=MessageModel::where('id_message',$id)->first();
        return response()->json([
            'message'=>'Success',
            'data'=>[$response]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data=  MessageModel::where('id_message',$id);
      $data->delete();
        return redirect('/message')->with('delete_success','Data berhasil dihapus');
    }
}
