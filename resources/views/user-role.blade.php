@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col " style="background: #fbf0f7; height: 100vh;">
            <div class="card-header">Admin Dashboard</div>
        </div>
        <div class="col-10" style="background: #947878; height: 100vh;">
        @if(session('updated'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> User role updated successfully.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
            <form enctype="multipart/form-data" method="POST" action="{{ url('/users/'.$user->id) }}">
            {{ csrf_field() }}
                <div>
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    @if($user)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $user->id}}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="dropdown">
                            {{$user->roles[0]->name}}
                                @if(count($roles) > 0)
                                <select class="custom-select" name="role">
                                    <option class="selected">Roles</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                 @endforeach   
                                </select>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endif
                    </table>
                </div>
                <button class="btn btn-primary" role="button">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection