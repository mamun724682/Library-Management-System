@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Users
                    <span class="badge bg-info">{{ $users->count() }}</span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('users.create') }}" class="btn btn-primary"><span class="fa fa-user"></span>Add User</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Registered as</th> --}}
                            <th>Status</th>
                            <th>Rule</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center"><img width="40px" style="border-radius: 50%;" src="{{ asset('uploads/avatar/'. $user->avatar) }}" /></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>{{ $user->reg_as? 'Teacher' : 'Student' }}</td> --}}
                                        <td>
                                            @if ( $user->is_approved)
                                                <p class="text-success">Verified</p>
                                                @else
                                                    <p class="text-primary">Pending</p>
                                            @endif

                                        </td>
                                        <td>
                                            @if ( $user->is_admin)
                                                <p class="text-success">Admin</p>
                                                @else
                                                    <p class="text-primary">General</p>
                                            @endif

                                        </td>

                                        <td>
                                            @if ($user->is_approved)
                                                <a href="{{ route('user.unverify', $user->id) }}" class="btn btn-xs btn-danger">Unverify</a>

                                                @else
                                                    <a href="{{ route('user.verify', $user->id) }}" class="btn btn-xs btn-info">Verify</a>
                                            @endif
                                            @if ($user->is_admin)
                                                <a href="{{ route('user.general', $user->id) }}" class="btn btn-xs btn-danger">General</a>

                                                @else
                                                    <a href="{{ route('user.admin', $user->id) }}" class="btn btn-xs btn-info">Admin</a>
                                            @endif

                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-dark">Edit</a>

                                            @if ($user->id != Auth::user()->id)
                                                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                            @endif

                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-danger">Profile</a>

                                         </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
