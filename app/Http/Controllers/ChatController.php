<?php

namespace App\Http\Controllers;
use App\Messages;
use Illuminate\Http\Request;
use App\User;
class ChatController extends Controller
{
    //
    public function index(){
        $id = auth()->user()->id;
        $data['pesan'] = Messages::with('user')->where('to','=',$id)->orderBy('id','desc')->paginate(10);
        return view('beken.chat.index',$data);
    }
    public function balas($id)
    {
        return view('beken.chat.new',['data'=>$id]);
    }
    public function tulis(){
        $data['user'] = User::where('status','ACTIVE')->where('level','!=','ADMIN')->get();
        return view('beken.chat.tulis',$data);
    }
    public function kirim(Request $request){
        $request->validate([
            'to' => 'required',
            'message' => 'required|max:255'
        ]);
        Messages::create($request->all());
        return redirect('guru/chat')->with('success','Pesan anda telah terkirim');
    }
}
