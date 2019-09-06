<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Role;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Post::all();
        $tags = Tag::all();

        $request->user()->authorizeRoles(['user', 'admin']);
        return view('welcome' , ['posts' => $posts, 'tags' => $tags]);
    }

    public function search(Request $request)
    {
       
        $tags = Tag::all();
        $keyword = $request->search;

        $match = Post::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('body', 'LIKE', '%' . $keyword . '%')
            ->get();
            if ($match)
            {
                return view('welcome', ['posts' => $match, 'tags' => $tags]);
                // return response()->json(['posts' => $match, 'tags' => $tags]);
            }else {
                // return ('welcome', ['noposts' => 'no match found!']);
                // return response()->json(['noposts' => 'no match found!']);
            }
            dd($match);


        // if (count($match) > 0) {
        //     return view('welcome', ['posts' => $match]);
        // } else return view('welcome', ['error' => 'no match found!']);
    }

    public function dashboard(Request $request)
    {
        $posts = Post::all();
        $users = User::all();
        $authorized = $request->user()->authorizeRoles('admin');
        // dd($users);

        return view('dashboard', ['authozized' => $authorized, 'users' => $users, 'posts' => $posts]);
    }

    public function update(Request $request, User $user, Role $role )
    {

       // return($request->role);
        $data = $request->validate([
            'role'=> 'required'
        ]);

        $user->roles()->sync([($data['role'])]);
       
        $redirect = $user->id;

        return redirect('/users/'.$redirect)->with(['updated' => 'User role updated successfully']);
    }

    public function role(User $user)
    {
        // dd($user->roles[0]->name);
        // dd($user->roles);
        $roles = Role::all();
        return view('user-role', ['user' => $user, 'roles' => $roles]);
    }
}
