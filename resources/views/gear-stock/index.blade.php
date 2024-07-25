@extends('layouts.landing')

@section('content')


<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Gear Stock</h1>
    <div class="flex justify-end mb-4">
    <a href="{{ route('gear-stock.create') }}" class="bg-green-500 text-white py-2 px-4 rounded">Add Gear</a>
</div>
<div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gearStock as $gear)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $gear->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gear->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gear->type }}</td>
                    <td class="bpx-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($gear->image)
                            <img src="{{ asset('storage/' . $gear->image) }}" alt="{{ $gear->name }}" class="h-16 w-16 object-cover">
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gear->estado }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="{{ route('gear-stock.edit', $gear->id) }}" class="bg-purple-700 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('gear-stock.destroy', $gear->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
