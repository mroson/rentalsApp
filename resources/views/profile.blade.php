@extends('layouts.landing')

@section('content')
<div class="container mx-auto px-4">
    <div class="py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4">
        <h1 class="text-3xl font-bold mb-4">{{ $user->name }}'s Profile</h1>
            <img class="rounded w-36 h-36" src="https://randomuser.me/api/portraits/lego/5.jpg" alt="user profile photo" class="h-full w-full object-cover">
                </div>
            <div class="p-4">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <br />
                <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">Edit</a>

                <!-- Otros detalles del perfil -->
            </div>
        </div>
    </div>
</div>  
@endsection
