@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-semibold">Tickets</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-4 mb-6">
        <a href="{{ route('tickets.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition duration-200">
            Create Ticket
        </a>
    </div>

    @if($tickets->isEmpty())
        <p>No tickets found.</p>
    @else
        <ul class="mt-4">
            @foreach($tickets as $ticket)
                <li class="border-b py-4">
                    <div>
                        <strong>{{ $ticket->subject }}</strong>
                        <div class="mt-2">
                            <span class="badge bg-gray-200 text-gray-800">{{ ucfirst($ticket->status) }}</span>
                            <span class="badge bg-green-200 text-green-800">{{ ucfirst($ticket->priority) }} Priority</span>
                            <span class="badge bg-blue-200 text-blue-800">{{ ucfirst($ticket->category) }}</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">Reported at: {{ $ticket->reported_at->format('Y-m-d H:i') }}</p>
                        @if($ticket->attachment)
                            <a href="{{ Storage::url($ticket->attachment) }}" class="text-blue-600 hover:underline" target="_blank">View Attachment</a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
