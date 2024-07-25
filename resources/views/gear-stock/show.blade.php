@extends('layouts.landing')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Gear Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Gear Information</h2>
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <p class="mt-1 text-gray-900">{{ $gearStock->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Type</label>
            <p class="mt-1 text-gray-900">{{ $gearStock->type }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            @if($gearStock->image)
                <img src="{{ asset('storage/' . $gearStock->image) }}" alt="{{ $gearStock->name }}" class="mt-2 max-w-xs">
            @else
                <p class="mt-1 text-gray-900">No image available</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Estado</label>
            <p class="mt-1 text-gray-900">{{ $gearStock->estado }}</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('gear-stock.edit', $gearStock->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded">Edit</a>
            <a href="{{ route('gear-stock.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Back to List</a>
        </div>
    </div>
</div>
@endsection
