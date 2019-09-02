@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="media">
                        <div style="display: grid; ">
                            <img style="height: 100px; background-color: cyan; border-radius: 50px; " src="{{Storage::url(auth()->user()->profile->avatar)}}" class="align-self-start mr-3 rounded-circles" alt="profile-avatar">
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> User profile updated successfully.
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-error alert-dismissible fade show">
                            <strong>Success!</strong> Something went wrong! Ensure you are filling all required field.
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        <form enctype="multipart/form-data" class="media-body" method="POST" action="{{ url('/profile/'.$user->profile->id.'/update') }}">
                          {{ csrf_field() }}
                            <div class="form-group row">
                              <label for="Name" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Name</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="name" type="text" class="form-control" id="Name" value="{{ $user->profile->name }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="username" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Username</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="username" type="text" class="form-control" id="username" value="{{ $user->profile->username }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Email</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="email" type="text" class="form-control" id="email" value="{{ $user->profile->email }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="phone" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Phone</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="phone" name="phone" type="text" class="form-control" id="phone" value="{{ $user->profile->phone_number }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="gender" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Gender</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <select class="form-control" name="gender">
                                    <option value="{{ $user->profile->gender }}">{{ $user->profile->gender }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="bio" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Bio</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="bio" type="text" class="form-control" id="bio" value="{{ $user->profile->bio }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="address" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Address</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="address" type="text" class="form-control" id="address" value="{{ $user->profile->address }}">
                              </div>
                            </div>
                            <div class="form-group">
                                  <label for="FormControlFile">Upload Image</label>
                                  <input name="avatar" type="file" class="form-control-file" id="FormControlFile" accept="image/*">
                            </div>
                            <button class="btn btn-primary" role="button" style=" margin-left: -15px;">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
