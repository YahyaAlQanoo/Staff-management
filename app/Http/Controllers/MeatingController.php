<?php

namespace App\Http\Controllers;

use App\Models\Meating;
use Illuminate\Http\Request;

class MeatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_meating()
    {
        // 1 :Eloquent (Model)
        $data = Meating::all();
        return response()->view('meating.show-meating' , ['meating_data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_meating()
    {
        return response()->view('meating.create-meating');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_meating(Request $request)
    {
        $request->validate([
            'meating_name'=>'required|string|min:2|max:20',
            'meating_date'=>'required',
            'meating_time'=>'required',
        ]);
        // 1 :Eloquent (Model)
        $meating = new Meating();
        $meating->meating_name = $request->input("meating_name");
        $meating->meating_date = $request->input("meating_date");
        $meating->meating_time = $request->input("meating_time");
        $saved = $meating->save();
        return redirect()->route('meating.show');
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
