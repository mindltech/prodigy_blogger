@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="media">
                    	<img style="height: 100px; width: 100px; background-color: cyan; border-radius: 50px; " src="{{Storage::url(auth()->user()->profile->avatar)}}" class="align-self-start mr-3 rounded-circles" alt="profile-avatar">

                    	<div class="media-body">
                    		<p class="mr-3" style="font-weight: 700;">Name:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->name)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Username:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->username)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Email:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->email)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Phone:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->phone_number)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Gender:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->gender)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Bio:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->bio)}}</span>
                    		</p>
                    		<p class="mr-3" style="font-weight: 700;">Address:
                    			<span style="padding-left: 10px; text-transform: capitalize; font-weight: 300">{{(auth()->user()->profile->address)}}</span>
                    		</p>
                    		<a class="btn btn-primary" href="{{ url('/edit-profile') }}" role="button">Edit</a>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
