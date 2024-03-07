<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);
       Categorie::create($validatedData);
        return redirect()->route('admin.cats');
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
        $cate= Categorie::findOrFail($id);
        return view("admin.editer_categorie",[
            'cate'=> $cate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'desc' => 'required',
        ]);

        $cate = Categorie::findOrFail($id);
        $cate->name = strip_tags($request->input('name'));
        $cate->description = strip_tags($request->input('desc'));
       
        $cate->save();
        return redirect()->route('admin.cats');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Categorie::findOrFail($id);
        $cate->delete();
        return redirect()->route('admin.cats');
    }
}