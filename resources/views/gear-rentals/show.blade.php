@extends('layouts.landing')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Gear Rental Details</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
    <img  class="rounded-full w-96 h-96" src="http://laravel.test/storage/{{ $gearRental->gearStock->image ?? 'N/A' }}" />
        <p class="text-lg font-semibold mb-2"><strong>ID:</strong> {{ $gearRental->id }}</p>
        <p class="text-lg font-semibold mb-2"><strong>Gear Name:</strong> {{ $gearRental->gearStock->name ?? 'N/A' }}</p>
        <p class="text-lg font-semibold mb-2"><strong>Renter:</strong> {{ $gearRental->user->name ?? 'N/A' }}</p>
        <p class="text-lg font-semibold mb-2"><strong>Rental Date:</strong> {{ $gearRental->rental_date }}</p>
        <p class="text-lg font-semibold mb-4"><strong>Return Date:</strong> {{ $gearRental->return_date }}</p>

        <div class="flex gap-4">
            <a href="{{ route('gear-rentals.edit', $gearRental->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('gear-rentals.destroy', $gearRental->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
            </form>
            <a href="{{ route('gear-rentals.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to List</a>
        </div>
    </div>
</div>
@endsection
