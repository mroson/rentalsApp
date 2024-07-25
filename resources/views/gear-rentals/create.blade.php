@extends('layouts.landing')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Add New Gear Rental</h1>

    <form action="{{ route('gear-rentals.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label for="gear_id" class="block text-sm font-medium text-gray-700">Gear Name</label>
            <select name="gear_id" id="gear_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                <option value="">Select Gear</option>
                @foreach ($gearStocks as $gearStock)
                    <option value="{{ $gearStock->id }}">{{ $gearStock->name }}</option>
                @endforeach
            </select>
            @error('gear_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Renter</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                <option value="">Select Renter</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="rental_date" class="block text-sm font-medium text-gray-700">Rental Date</label>
            <input type="date" name="rental_date" id="rental_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('rental_date') }}" required>
            @error('rental_date')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="return_date" class="block text-sm font-medium text-gray-700">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('return_date') }}">
            @error('return_date')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-purple-700  text-white px-4 py-2 rounded hover:bg-purple-800">Submit</button>
            <a href="{{ route('gear-rentals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>


@endsection
