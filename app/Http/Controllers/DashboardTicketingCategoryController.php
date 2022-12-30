<?php

namespace App\Http\Controllers;

use App\Models\TicketingCategory;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTicketingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.ticketings.categories.index',[
            'TicketingCategories' => TicketingCategory::all()
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
        return view('dashboard.ticketings.categories.create', [
            'TicketingCategories' => TicketingCategory::all()
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

        TicketingCategory::create($validatedData);
        
        return redirect('/dashboard/ticketings/categories')->with('success', 'New Category Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketingCategory $TicketingCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketingCategory $TicketingCategory)
    {
        //
        return view('dashboard.ticketings.categories.edit',
        [
            'TicketingCategory' => $TicketingCategory
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketingCategory $TicketingCategory)
    {
        //
        $rules = [
            'name' => 'required|max:255'
        ];

        if ($request->slug != $TicketingCategory->slug){
            $rules['slug'] = 'required|unique:TicketingCategories';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['id'] = auth()->user()->id;

        TicketingCategory::where('id', $TicketingCategory->id)
        ->update($validatedData);

        return redirect('/dashboard/ticketings/categories')->with('success', 'Category Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketingCategory $TicketingCategory)
    {
        //
        dd($TicketingCategory);
        TicketingCategory::destroy($TicketingCategory->id);
        return redirect('/dashboard/ticketings/categories')->with('success', 'Category Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(TicketingCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
