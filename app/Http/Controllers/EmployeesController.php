<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert_serves()
    {
         $hr = DB::table('users')->where('is_hr', '1')->get();
        // dd($hr[0]->name);
        return view('employees.insert-service', [
            'hr' => $hr,
        ]);
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_serves(Request $request)
    {


        $request->validate([
            'employee_name' => 'required|string|min:3|max:30',
            'content' => 'required|string|min:10|max:500',
            'name' => 'required',
         ]);


        $service = new Service();
        $service->employee_name = $request->input('employee_name');
        if (!$request->hr) {

            $manager = DB::table('users')->where('is_manager', 1 )->first();
            $manager_id = $manager->id;
            $service->manager_id = $manager_id ;
            $service->hr_id = Auth::user()->id;


        }else {
            $service->hr_id = $request->input('hr');
            $service->employee_id = Auth::user()->id;
        }

        $service->content = $request->input('content');
        $service->name = $request->input('name');
        $service->date = date('Y-m-d H:i:s');

        $saved = $service->save();



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
        if(Auth::user()->is_hr){
            $services = DB::table('services')->where('hr_id', $id)->orderBy('response', 'asc')->get();

        }else {
            $services = DB::table('services')->where('employee_id', $id)->orderBy('response', 'asc')->get();

        }
        return view('employees.status-requests', [
            'services' => $services,
        ]);
    }




}
