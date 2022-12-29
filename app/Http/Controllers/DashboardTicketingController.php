<?php

namespace App\Http\Controllers;

use App\Models\Ticketing;
use App\Models\Category;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardTicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.ticketings.index',[
            'ticketings' => Ticketing::all()
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
        return view('dashboard.ticketings.create', [
            'divisions' => Division::all()
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
            'name' => 'required|max:255',
            'division_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'image_before' => 'image|file|max:5120',
            'priority' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);

        // $validatedData['user_id'] = auth()->user()->id;

        if($request->file('image_before')) {
            $validatedData['image_before'] = $request->file('image_before')->store('ticketing-image_before');
        }

        Ticketing::create($validatedData);

        return redirect('/dashboard/ticketings')->with('success', 'New Ticket Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketing $ticketing)
    {
        //
        return view('dashboard.ticketings.show',[
            'ticketing' => $ticketing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketing $ticketing)
    {
        return view('dashboard.ticketings.edit', [
            'ticketing' => $ticketing,
            'divisions' => Division::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticketing $ticketing)
    {
        //
        $rules = [
            'name' => 'required|max:255',
            'division_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Ticketing::where('id', $ticketing->id)
        ->update($validatedData);

        return redirect('/dashboard/ticketings')->with('success', 'Ticket Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketing $ticketing)
    {
        //
        Ticketing::destroy($ticketing->id);
        return redirect('/dashboard/ticketings')->with('success', 'Ticket Has Been Deleted!');
    }
}
