@extends('layouts.app')

@section('content')

    <div class="ticket-info">
        <div class="container">

            <h2>Welcome {{ Auth::user()->name }}</h2>


            <a href="{{ route('users.tickets.create') }}">CREATE</a>

            @foreach($ticket as $tickets)
                {{ $tickets->title }}
                <a href="{{ route('users.tickets.edit', $tickets->id) }}">Edit Ticket</a>
            @endforeach
    </div>
    </div>

@endsection
