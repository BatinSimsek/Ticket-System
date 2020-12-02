@extends('layouts.app')

@section('content')

    <div class="admin-info">
        <div class="container">

            <h2>Information Users</h2>

            <table class="table">
                <thead>
                <tr class="tablesupplies">
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="tablesupplies">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td><a href="{{ route('admin.user.edit', $user->id) }}">Edit</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
