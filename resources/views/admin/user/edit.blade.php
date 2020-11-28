@extends('layouts.app')

@section('content')

    <div class="admin-first-page">
        <div class="container">
            <h2>User edit page </h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet aperiam blanditiis consequatur dolore id iste itaque nisi officia reiciendis! Distinctio dolor dolore doloremque esse impedit, iusto nostrum quidem vitae?</p>

            <form action="{{ route('admin.user.update', $user) }}" method="post">
                    @method('PUT')
                    @csrf


                    @foreach($roles as $role)
                        <input type="checkbox" name="roles[]" value="{{$role->id}}">
                        <label>{{ $role->name }}</label>
                    @endforeach

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
           </form>

        </div>
    </div>

@endsection
