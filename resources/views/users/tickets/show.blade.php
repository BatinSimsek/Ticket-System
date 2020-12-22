@extends('layouts.app')

@section('content')

    <h1 class="card-title"> {{ $ticket->title }} </h1>
    <p class="card-text"> {{ $ticket->ticket }} </p>


    <form method="POST" action="{{ route('users.tickets.destroy', $ticket->id) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-warning" type="submit" value="DELETE">
    </form>

  <a href="{{ route('users.tickets.edit' , $ticket->id) }}">edit</a>

@endsection
