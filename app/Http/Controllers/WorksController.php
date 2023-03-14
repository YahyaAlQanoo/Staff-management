<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_works()
    {

        // Eloquent
        $works = DB::table('works')->where('user_id', '=', Auth::user()->id)->get();

        // dd($works);
        
        return response()->view('works.show_works' , ['works' =>$works]);
    }


    public function download($id)
    {
        $work = DB::table('works')->where('id', '=', $id)->first();
 
        $works = DB::table('works')->where('user_id', '=', Auth::user()->id)->get();


        return response()->download(public_path('storage' .'/' . $work->works_file));
        return response()->view('works.show_works' , ['works' =>$works]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_works()
    {
        return response()->view('works.create_works');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_works(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'string',
            'works_name' => 'required|string|min:3|max:40',
            'works_file' => 'required|file|max:1024',
        ]);


        $work = new Work();
        $work->user_id = Auth::user()->id;
        $work->works_name = $request->input('works_name');
        if ($request->hasFile('works_file')) {
            $file = $request->file('works_file');
            $file_name = time() . '_works_file_' . $work->works_name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("files", $file_name, ['disk' => 'public']);
            $work->works_file = "files/" . $file_name;
        }
        $saved = $work->save();
        return redirect()->route('works.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
