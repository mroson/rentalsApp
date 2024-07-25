@extends('layouts.landing')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Gear Rentals</h1>
             <div class="flex justify-end mb-4">
                    <a href="{{ route('gear-rentals.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add New Rental</a>
                        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gear Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Renter</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rental Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Return Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($gearRentals as $gearRental)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $gearRental->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gearRental->gearStock->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gearRental->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gearRental->rental_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $gearRental->return_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('gear-rentals.show', $gearRental->id) }}" class="bg-purple-700 text-white py-1 px-3 rounded hover:bg-purple-900">View</a>
                            <a href="{{ route('gear-rentals.edit', $gearRental->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded ml-4">Edit</a>
                            <form action="{{ route('gear-rentals.destroy', $gearRental->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 py-1 px-3 rounded text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
         </div>


     <div class="space"></div>

       <!-- Calendario -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 my-8"> 
                <h2 class="text-2xl font-semibold mb-4">Rental Calendar</h2>
                     <div id="calendar"></div>
            </div>
</div>
<!-- Incluye los archivos de FullCalendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<style>
.fc-event {
    position: relative;
    display: block;
    font-size: .85em;
    line-height: 3;
    border-radius: 3px;
    border: 1px solid #7e22ce
}

.fc-event,.fc-event-dot {
    background-color: #7e22ce;
}

.fc-event,.fc-event:hover {
    color: #fff
}

.fc-not-allowed,.fc-not-allowed .fc-event {
    cursor: not-allowed
}

.fc-event .fc-bg {
    z-index: 1;
    background: #fff;
    opacity: .25
}
    </style>
<script>
     $(document).ready(function() {
        // Convierte $events a una variable de JavaScript válida
        var eventsData = @json($events, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false,
            events: eventsData
        });
    });
</script>



@endsection
