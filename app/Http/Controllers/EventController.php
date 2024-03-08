<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
            'date' => 'required',
            'price' => 'required',
            'nbrPlacesDispo' => 'required',
            'description' => 'required',
            'lieu' => 'required',
            'Validation_type' => 'required',
            'picture' => 'required|image'
        ]);
        $user= Auth::user()->id;
        $fileName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images/events'),$fileName);
        $attributes = array_merge($validatedData, ['picture' => $fileName],['user_id'=>$user]);
        
        Event::create($attributes);
        return redirect()->route('orga.events');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}