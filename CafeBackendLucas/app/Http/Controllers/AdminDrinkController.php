<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class AdminDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('admin.drinks.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // valideer de invoer
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image',
            'price'       => 'required|numeric',
        ]);

        // array data
        $data = $request->only(['name', 'description', 'price']);

        //image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('drinks', 'public');
        }

        // create
        Drink::create($data);

        // succesmelding
        return redirect()->route('admin.drinks.index')->with('success', 'Drink created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink)
    {
        return view('admin.drinks.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink)
    {
        return view('admin.drinks.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink)
    {
        // Valideer de invoer
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image',
            'price'       => 'required|numeric',
        ]);

        // array met geg vullen
        $data = $request->only(['name', 'description', 'price']);

        // image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('drinks', 'public');
        }

        // update
        $drink->update($data);

        // succesmelding
        return redirect()->route('admin.drinks.index')->with('success', 'Drink updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();

        return redirect()->route('admin.drinks.index')->with('success', 'Drink deleted successfully!');
    }
}
