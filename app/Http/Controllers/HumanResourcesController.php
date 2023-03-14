<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HumanResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_orders()
    {
        $services = DB::table('services')->where('hr_id', Auth::user()->id )->orderBy('response', 'asc')->get();
        return view('human_resources.orders', [
            'services' => $services,
        ]);
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passing_orders(Request $request, $id)
    {
        // dd($id);
        $service = DB::table('users')->where('is_manager', 1 )->first();
        $service_id = $service->id;
        $service =Service::findOrFail($id);

        $service->manager_id = $service_id ;
        $saved = $service->save();
        // return route('index');
        return redirect()->route('index');

    }


    public function insert_serves()
    {
        // $hr = User::where('is_hr','=','1')->get();
        // dd($hr[0]->name);
        return view('human_resources.insert-service');
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_serves(Request $request)
    {
        // dd($request->all());

     
        // dd($request->all());

        $request->validate([
            'employee_name' => 'required|string|min:3|max:30',
            'content' => 'required|string|min:30|max:500',
            'name' => 'required',
         ]);

        
        $service = new Service();
        $service->employee_name = $request->input('employee_name');
            $manager = DB::table('users')->where('is_manager', 1 )->first();
            $manager_id = $manager->id;
            $service->manager_id = $manager_id ;
            $service->hr_id = Auth::user()->id;

    

        $service->content = $request->input('content');
        $service->name = $request->input('name');
        $service->date = date('Y-m-d H:i:s');

        $saved = $service->save();

        // $saved = $service->save();
 
        
        return redirect()->route('index');


    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_serves($id)
    {
        $services = DB::table('services')->where('hr_id', $id)->where('employee_id', null)->orderBy('response', 'asc')->get();
        // dd($services);
        return view('human_resources.status-requests', [
            'services' => $services,
        ]);
    }
}
