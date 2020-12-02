@extends('layouts.app')

@section('content')

    <div class="user-info">
        <div class="container">
            {{ Auth::user()->name }}
            {{ Auth::user()->email }}

            <a href="{{ route('users.user.edit', \Illuminate\Support\Facades\Auth::user()->id) }}">Edit</a>


        </div>
    </div>


@endsection
