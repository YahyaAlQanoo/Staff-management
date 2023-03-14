<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChatsController extends Controller
{


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $complaints = Chat::all();
        $chats = DB::table('chats')
        ->join('users', 'chats.from', '=', 'users.id')
        ->select('chats.*', 'users.name')
        ->where('to','=', Auth::user()->id)->get();

        return view('chats.index', [
            'chats' => $chats,
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Create()
    {
         $users = DB::table('users')->where('id','!=', Auth::user()->id)
         ->where('is_employee','=', 1 )
         ->get();
        return view('chats.create', [
            'users' => $users,
        ]);
    }

          /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        // dd($request->all());

        $request->validate([
            'to' => 'required|string',
            'subject' => 'required|string|min:3|max:40',
            'content' => 'required|string|min:30|max:3000',
         ]);


        $chat = new Chat();
        $chat->from = Auth::user()->id;
        $chat->to = $request->input('to');
        $chat->subject = $request->input('subject');
        $chat->content = $request->input('content');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $image_name = time() . '_file_' . $chat->from . '.' . $file->getClientOriginalExtension();
            $file->storeAs("chats", $image_name,['disk' => 'public']);
            $chat->file = "chats/" . $image_name;
        }
        $saved = $chat->save();



  
        
        return redirect()->route('index');


    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $chat = DB::table('chats')
        ->join('users', 'chats.from', '=', 'users.id')
        ->select('chats.*', 'users.name')
        ->where('chats.id','=', $id)
        ->where('chats.to','=', Auth::user()->id)->first();
      
        

        return view('chats.show', [
            'chat' => $chat,
        ]);
    }

    public function download($id)
    {
        $chat = Chat::findOrFail($id);

        return response()->download(public_path('storage' .'/' . $chat->file));
        return view('chats.show', [
            'chat' => $chat,
        ]);
    }

}
