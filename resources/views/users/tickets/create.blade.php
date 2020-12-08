@extends('layouts.app')

@section('content')

    <div class="ticket-create">
        <div class="container">

            <form action="{{ route('users.tickets.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="ticket" id="" value="{{ old('ticket') }}">
                </div>


                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Create Product">
                </div>
            </form>

        </div>
    </div>

@endsection
