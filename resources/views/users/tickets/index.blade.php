@extends('layouts.app')

@section('content')

    <div class="ticket-info">
        <div class="container">

            <h2>Welcome {{ Auth::user()->name }}</h2>


            <a href="{{ route('users.tickets.create') }}">CREATE</a>

            @foreach($ticket as $tickets)
                @if($tickets->ticket_id === $tickets->user_id)
                    {{$tickets->name}}
                @endif
            @endforeach
    </div>
    </div>

@endsection
