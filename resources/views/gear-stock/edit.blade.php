@extends('layouts.landing')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Gear</h1>
    <form action="{{ route('gear-stock.update', $gearStock->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ $gearStock->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="type" class="block text-gray-700">Type</label>
            <input type="text" name="type" value="{{ $gearStock->type }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @if($gearStock->image)
                <img src="{{ asset('storage/' . $gearStock->image) }}" alt="{{ $gearStock->name }}" class="h-16 w-16 object-cover mt-2">
            @endif
        </div>
        <button type="submit" class="bg-purple-700 text-white py-2 px-4 rounded">Update Gear</button>
    </form>
</div>
@endsection
