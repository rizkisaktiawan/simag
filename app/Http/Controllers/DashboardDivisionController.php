<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.divisions.index',[
            'divisions' => Division::all()
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
        return view('dashboard.divisions.create', [
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Division::create($validatedData);
        
        return redirect('/dashboard/divisions')->with('success', 'New Division Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
        return view('dashboard.divisions.edit', [
            'division' => $division,
            'divisions' => Division::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
        $rules = [
            'name' => 'required|max:255'
        ];

        if ($request->slug != $division->slug){
            $rules['slug'] = 'required|unique:divisions';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['id'] = auth()->user()->id;

        Division::where('id', $division->id)
        ->update($validatedData);

        return redirect('/dashboard/divisions')->with('success', 'Division Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
        Division::destroy($division->id);
        return redirect('/dashboard/divisions')->with('success', 'Division Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Division::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
