@extends('layouts.app')

@section('content')

<div class="container-fluid main">
    <div class="row">

        <div class="col-md-5">
            <div class="new-user-form">
                <span class="inner">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST" action="">
                    @csrf
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="birthDate">Date of Birth</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </span>
            </div>
        </div>

        <div class="col-md-7">
            <div class="users-table">
                <span class="inner">

                    @if(count($users) <= 0)
                        <p>There are currently no users added.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->age() }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('pagination::bootstrap-5') }}
                    @endif

                </span>
            </div>
        </div>

    </div>
</div>

@endsection
