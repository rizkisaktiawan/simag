<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Division;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('dashboard.employees.index',[
        //     'employees' => Employee::all()
        // ]);
        $employees = Employee::latest()->paginate(5);
        return view('dashboard.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create', [
            'divisions' => Division::all(),
            'statuses' => Status::all()
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
        //
        // dd($request);
        $validatedData = $request->validate([
            'nip' => 'required|unique:employees',
            'name' => 'required|max:255',
            'date_birth' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'no_ktp' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date_join' => 'required',
            'division_id' => 'required',
            'position' => 'required',
            'status_id' => 'required'
        ]);

        // $validatedData['nip'] = auth()->user()->nip;

        Employee::create($validatedData);

        return redirect('/dashboard/employees')->with('success', 'New Employee Has Been Added!');
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
        return view('dashboard.employees.show',[
            'employee' => $employee
        ]);
        // $employees = Employee::all();
        // return view('dashboard.employees.show', compact('employee'));
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
        return view('dashboard.employees.edit', [
            'employee' => $employee,
            'divisions' => Division::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        // dd($request);
        $rules = [
            'nip' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'date_join' => 'required',
            'division_id' => 'required',
            'position' => 'required',
            'status_id' => 'required'
        ];

        // if ($request->slug != $post->slug){
        //     $rules['slug'] = 'required|unique:posts';
        // }

        $validatedData = $request->validate($rules);

        // $validatedData['id'] = auth()->user()->id;

        Employee::where('id', $employee->id)
        ->update($validatedData);

        return redirect('/dashboard/employees')->with('success', 'Employee Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        Employee::destroy($employee->id);
        return redirect('/dashboard/employees')->with('success', 'Employee Has Been Deleted!');
    }
}
