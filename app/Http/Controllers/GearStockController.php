<?php

namespace App\Http\Controllers;

use App\Models\GearStock;
use Illuminate\Http\Request;

class GearStockController extends Controller
{
    public function index()
    {
        $gearStock = GearStock::all();
        return view('gear-stock.index', compact('gearStock'));
    }

    public function create()
    {
        return view('gear-stock.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'image' => 'nullable|image|max:2048', // Validación opcional para imágenes
    ]);

    $path = $request->file('image') ? $request->file('image')->store('gear_images', 'public') : null;

    $gearStock = new GearStock([
        'name' => $request->get('name'),
        'type' => $request->get('type'),
        'image' => $path,
    ]);
    $gearStock->save();

    return redirect('/gear-stock')->with('success', 'Gear added!');
}

    public function show($id)
    {
        $gearStock = GearStock::find($id);
        return view('gear-stock.show', compact('gearStock'));
    }

    public function edit($id)
    {
        $gearStock = GearStock::find($id);
        return view('gear-stock.edit', compact('gearStock'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'image' => 'nullable|image',
        ]);

        $gearStock = GearStock::find($id);
        $gearStock->name = $request->get('name');
        $gearStock->type = $request->get('type');
        
        if ($request->file('image')) {
            $path = $request->file('image')->store('gear_images', 'public');
            $gearStock->image = $path;
        }

        $gearStock->save();

        return redirect('/gear-stock')->with('success', 'Gear updated!');
    }

    public function destroy($id)
    {
        $gearStock = GearStock::find($id);
        $gearStock->delete();

        return redirect('/gear-stock')->with('success', 'Gear deleted!');
    }
}
