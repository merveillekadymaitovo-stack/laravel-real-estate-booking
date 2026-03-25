<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_per_night' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('properties', 'public');

        Property::create([
            'name' => $request->name,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
            'image' => $path
        ]);

        return redirect('/properties')->with('success', 'Propriété ajoutée !');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        $property->update($data);

        return redirect('/properties')->with('success', 'Propriété modifiée !');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect('/properties')->with('success', 'Propriété supprimée !');
    }
}