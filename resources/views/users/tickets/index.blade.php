@extends('layouts.app')

@section('content')

    <div class="ticket-info">
        <div class="container">

            <h2>Welcome {{ Auth::user()->name }}</h2>

            <a href="{{ route('users.ticket.export_excel') }}">Tickethistory</a>


            <a href="{{ route('users.tickets.create') }}">CREATE</a>

            @foreach($ticket as $tickets)
                {{ $tickets->title }}
                <a href="{{ route('users.tickets.show', $tickets->id) }}">Show</a>
            @endforeach
    </div>
    </div>

@endsection
