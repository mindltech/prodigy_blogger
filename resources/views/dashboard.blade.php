@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col " style="background: #fbf0f7; height: 100vh;">
            <div class="card-header">Admin Dashboard</div>
        </div>
        <div class="col-10" style="background: #947878; height: 100vh;">
            <div>
                <!-- @for($i = 1; $i <= (count($users)); $i++)
                <button type="button" class="btn btn-primary">
                     Total number of users <span class="badge badge-light">{{ $i += $i }}</span>
                </button>
                @endfor -->

                <button type="button" class="btn btn-primary">
                     Total number of users <span class="badge badge-light">{{ $users->count() }}</span>
                </button>
            </div>

            <form enctype="multipart/form-data" method="POST" action="">
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
                    @if(count($users) > 0)
                    <tbody>
                     @foreach($users as $user)
                        <tr>
                        
                            <th scope="row">{{ $user->id}}</th>
                    
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="dropdown">
                                <a class="dropdown-item" href="{{ url('/users/'.$user->id) }}">
                                    {{ __('Change Role') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
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