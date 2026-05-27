@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h3>Quản lý Users</h3>
</div>

<div class="card shadow border-0 rounded-4">

    <div class="card-body">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                <tr>
                    <td>{{ $user->account_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role_name }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection