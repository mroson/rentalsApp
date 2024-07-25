<?php

namespace App\Http\Controllers;

use App\Models\GearRental;
use App\Models\GearStock;
use App\Models\User;
use Illuminate\Http\Request;

class GearRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gearRentals = GearRental::with(['gearStock', 'user'])->get();

        $events = [];
        foreach ($gearRentals as $rental) {
            $events[] = [
                'title' => $rental->gearStock->name . ' - ' . ($rental->User->name ?? 'Unknown User'), // Ajusta el título según tus necesidades
                'start' => $rental->rental_date,
                'end' => $rental->return_date,
            ];
        }
    
        ($events); // Añade esto para verificar el formato de los datos
    
        return view('gear-rentals.index', [
            'gearRentals' => $gearRentals,
            'events' => $events
        ]);
}


    public function create()
    {
        // Obtener todos los gear stocks y usuarios
        $gearStocks = GearStock::where('available', true)->get();
        $users = User::all();

        return view('gear-rentals.create', compact('gearStocks', 'users'));
    }

    public function store(Request $request)
    {
        // Validar y almacenar la nueva renta
        $validated = $request->validate([
            'gear_id' => 'required|exists:gear_stocks,id',
            'user_id' => 'required|exists:users,id',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:rental_date',
        ]);

        // Crear la nueva renta
        GearRental::create($validated);

        // Opcionalmente, puedes actualizar el estado de disponibilidad del gear
        // $gearStock = GearStock::find($validated['gear_id']);
        // $gearStock->update(['available' => false]);

        return redirect()->route('gear-rentals.index')->with('status', 'Gear Rental Created!');
    }

    public function show(GearRental $gearRental)
    {
        return view('gear-rentals.show', compact('gearRental'));
    }

    public function edit(GearRental $gearRental)
    {
        // Obtener todos los gear disponibles
        $users = User::all();
        $gearStocks = GearStock::where('available', true)->get();
        return view('gear-rentals.edit', compact('gearRental', 'users', 'gearStocks'));
    }

    public function update(Request $request, GearRental $gearRental)
    {
        $request->validate([
            'gear_id' => 'required|exists:gear_stocks,id',
            'user_id' => 'required|exists:users,id',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:rental_date',
        ]);

        $gearRental->update($request->all());

        return redirect()->route('gear-rentals.index')->with('success', 'Gear rental updated successfully.');
    }

    public function destroy(GearRental $gearRental)
    {
        $gearRental->delete();

        return redirect()->route('gear-rentals.index')->with('success', 'Gear rental deleted successfully.');
    }

    public function data()
    {
        try {
            $rentals = GearRental::with('gearStock')->get(['id', 'gear_id', 'rental_date', 'return_date']);
            return response()->json($rentals);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
