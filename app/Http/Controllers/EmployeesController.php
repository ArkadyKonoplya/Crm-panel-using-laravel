<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employee = DB::table('users')->get();

        return view('employee.list', ['employees' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $client = new User();
        $client->First_Name= $request->first_name;
        $client->Last_Name= $request->last_name;
        $client->email= $request->Email;
        $client->Cell_number= $request->Cell_number;
        $client->Position= $request->Position;
        $password = Hash::make($request->Password);
        $client->password= $password;
        // $client->Picture= $request->Picture;
        $client->save();
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $id = $request->edit_id;

        $client = User::find($id);
        $client->First_Name= $request->edit_first_name;
        $client->Last_Name= $request->edit_last_name;
        $client->email= $request->edit_Email;
        $client->Cell_number= $request->edit_Cell_number;
        $client->Position= $request->edit_Position;
        // $client->Picture= $request->edit_Picture;
        $client->save();
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function active_employee(Request $request, User $employee)
    {
        //
                
        $employee_active = $request->employee_active;
        $employee = User::find($employee_active);
        $employee->Status= "0";
        $employee->save();
        return redirect('/employee');
    }
    public function inactive_employee(Request $request, User $employee)
    {
        //
                
        $employee_active = $request->employee_inactive;
        $employee = User::find($employee_active);
        $employee->Status= '1';
        $employee->save();
        return redirect('/employee');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $employee)
    {
        $id = $request->delete_id;
        $employee = User::find($id);

        $employee->delete();
        return redirect('/employee');

    }
}
