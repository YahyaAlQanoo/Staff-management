<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_orders()
    {
        $id = Auth::user()->id;
        // dd($id);
        $services = DB::table('services')->where('manager_id', '=', $id)->orderBy('response', 'asc')->get();

        return view('manager.show-orders', [
            'services' => $services,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_response($id)
    {
        return view('manager.create-response', compact('id'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_response(Request $request, $id)
    {
        $request->validate([
            'response' => 'required',
        ]);
        $service = Service::findOrFail($id);
        //  dd($service);
        if ($request->response == 1) {
            // dd()
            $service->response = 1;
        } else {
            $service->response = 0;
        }
        $saved = $service->save();

        // $service = new Service();
        // $service->employee_name = $request->input('employee_name');
        // $service->hr_id = $request->input('hr');
        // $service->content = $request->input('content');
        // $service->name = $request->input('name');
        // $service->date = date('Y-m-d H:i:s');
        // $service->employee_id = Auth::user()->id;

        // $saved = $service->save();


        return redirect()->route('show_orders');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert_users()
    {
        $departments = Department::all();
        return view('manager.users.create', [
            'departments' => $departments,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_users(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'user_name' => 'required|string|min:3|max:20',
            'email' => 'required|string|email',
            'type' => 'required',
            'department' => 'required',
            'information' => 'required|string|min:10|max:300',
            'password' => [
                'required', 'string',
                // RulesPassword::min(8)
                // ->letters()
                // ->numbers()
                // ->symbols()
                // ->mixedCase()
                // ->uncompromised()
            ]
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username  = $request->input('user_name');
        $user->email  = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->information = $request->input('information');
        $user->department_id = $request->input('department');
        if ($request->type === 'employee') {
            $user->is_employee = true;
        } else {
            $user->is_hr = true;
        }
        $saved = $user->save();
        return redirect()->route('show_users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_users()
    {

        $users = DB::table('departments')
            ->rightJoin('users', 'departments.id', '=', 'users.department_id' )
            ->select('users.*', 'departments.name as department_name')
            ->get();


         return view('manager.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert_departments()
    {

        return view('manager.departments.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_departments(Request $request)
    {
        $request->validate([
            'department' => 'required|string|min:3|max:30',
        ]);


        $service = new Department();
        $service->name = $request->input('department');
        $saved = $service->save();


        return redirect()->route('show_departments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_departments()
    {

        $departments = Department::all();
        return view('manager.departments.index', [
            'departments' => $departments,
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function departments_user($id)
    {
        $users = DB::table('users')->where('department_id', $id)->get();
        return view('manager.departments.departments-users', [
            'users' => $users,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_profile($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        $department = DB::table('departments')
        ->select('name')
        ->where('id', '=', $user->department_id)->first();

        $works = DB::table('works')->where('user_id', '=', $user->id)->get();

         return view('manager.users.user_profile', [
            'department' => $department,
            'works' => $works,
            'user' => $user,
        ]);
    }
}
