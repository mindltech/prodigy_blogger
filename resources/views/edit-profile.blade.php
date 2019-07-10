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
                            <!-- <form class="align-self-start mr-3">
                                <div class="form-group">
                                  <label for="FormControlFile">Upload Image</label>
                                  <input type="file" class="form-control-file" id="FormControlFile">
                                </div>
                            </form> -->
                        </div>
                        <form enctype="multipart/form-data" class="media-body" method="POST" action="{{ url('/profile/'.$user->profile->id.'/update') }}">
                          {{ csrf_field() }}
                            <div class="form-group row">
                              <label for="Name" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Name</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="name" type="text" class="form-control" id="Name" placeholder="{{ $user->profile->name }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="username" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Username</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="username" type="text" class="form-control" id="username" placeholder="{{ $user->profile->username }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Email</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="email" type="text" class="form-control" id="email" placeholder="{{ $user->profile->email }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="phone" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Phone</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="phone" name="phone" type="text" class="form-control" id="phone" placeholder="{{ $user->profile->phone_number }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="gender" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Gender</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <select class="form-control" name="gender" required>
                                    <option value="">{{ $user->profile->gender }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="bio" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Bio</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="bio" type="text" class="form-control" id="bio" placeholder="{{ $user->profile->bio }}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="address" class="col-sm-2 col-form-label" style="    padding-right: 0px; padding-left: 0px;">Address</label>
                              <div class="col-sm-10" style="padding-right: 5px; padding-left: 0px;">
                                <input name="address" type="text" class="form-control" id="address" placeholder="{{ $user->profile->address }}">
                              </div>
                            </div>
                            <div class="form-group">
                                  <label for="FormControlFile">Upload Image</label>
                                  <input name="avatar" type="file" class="form-control-file" id="FormControlFile" accept="image/*">
                                </div>
                            <button class="btn btn-primary" role="button" style=" margin-left: -15px;">Update</button>
                        </form>

                        <!-- <div class="media-body">
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
                            <a class="btn btn-primary" href="#" role="button">Update</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
