@extends('layouts.app')

@section('content')

    <div class="ticket-edit-page">
        <div class="container">
            <h2>Ticket Edit page</h2>

            <form action="{{ route('users.tickets.update', $ticket) }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-right">title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $ticket->title }}" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ticket" class="col-md-2 col-form-label text-md-right">ticket</label>

                    <div class="col-md-6">
                        <input id="ticket" type="text" class="form-control @error('ticket') is-invalid @enderror" name="ticket" value="{{ $ticket->ticket }}" autofocus>

                        @error('ticket')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>

@endsection
