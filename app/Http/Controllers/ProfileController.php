<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('profile', ['user' => auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        
    }

    //
    public function author(User $user){
        // dd($user);
        return view('author', ['author' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view ('edit-profile', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|max:15|string',
            'gender' => 'required|string',
            'bio' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        // dd(auth()->user()->profile->avatar);
   

        if ($request->hasFile('avatar')) {
            $avatar_url = $request->file('avatar')->store('public/images/avatars');
        } else $avatar_url = auth()->user()->profile->avatar;

        $updated = $profile->update([
            // update the values here
            'name' =>$data['name'],
            'username' =>$data['username'],
            'email' =>$data['email'],
            'phone_number' =>$data['phone'],
            'gender' =>$data['gender'],
            'bio' =>$data['bio'],
            'address' =>$data['address'],
            'avatar' =>$avatar_url
        ]);

        $user = $profile->user()->update([
            'name' =>$data['name'],
            'username' =>$data['username'],
            'email' => $data['email'],
            'gender' => $data['gender']
        ]);


        if ($user) {
            return redirect('/profile')->with(['success' => 'Profile updated!']);
        }

        return back()->with(['error' => 'something went wrong!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
