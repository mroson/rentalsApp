@extends('layouts.landing')

@section('content')
<!-- card -->
<div class="card shadow-2xl w-80 m-4 p-6">
  <figure>
    <img src="https://images.pexels.com/photos/1081031/pexels-photo-1081031.jpeg"/>
  </figure>
  <div class="card-body">
    <h2 class="card-title"><strong>Gear Name:</strong> {{ $gearRental->gear_name }}</h2>
    <p><strong>Renter:</strong> {{ $gearRental->user->name }}</p>
    <p><strong>Rental Date:</strong> {{ $gearRental->rental_date }}</p>
    <p><strong>Return Date:</strong> {{ $gearRental->return_date }}</p>
    <a href="{{ route('gear-rentals.index') }}" class="btn btn-primary">Back</a>

</div>
</div>



@endsection
