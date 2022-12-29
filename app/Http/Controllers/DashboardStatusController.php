<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class DashboardStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.statuses.index',[
            'statuses' => Status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.statuses.create', [
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
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Status::create($validatedData);
        
        return redirect('/dashboard/statuses')->with('success', 'New Statuses Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
        return view('dashboard.statuses.edit', [
            'status' => $status,
            'statuses' => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
        $rules = [
            'name' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        // $validatedData['id'] = auth()->user()->id;

        Status::where('id', $status->id)
        ->update($validatedData);

        return redirect('/dashboard/statuses')->with('success', 'Status Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
        Status::destroy($status->id);
        return redirect('/dashboard/statuses')->with('success', 'Status Has Been Deleted!');
    }
}
