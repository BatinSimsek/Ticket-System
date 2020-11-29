@extends('layouts.app')

@section('content')

    <div class="admin-first-page">
        <div class="container">
            <h2>User edit page </h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet aperiam blanditiis consequatur dolore id iste itaque nisi officia reiciendis! Distinctio dolor dolore doloremque esse impedit, iusto nostrum quidem vitae?</p>

            <form action="{{ route('admin.user.update', $user) }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                @foreach($roles as $role)
                    <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                    <label>{{ $role->name }}</label>
                @endforeach

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

           </form>

        </div>
    </div>

@endsection
