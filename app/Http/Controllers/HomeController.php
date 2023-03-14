<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $requests)
    {

        if(User::count() <= 0){
            return redirect()->route('register');
        }

        $posts = Post::query()
                ->orderBy('date','desc')
                ->orderBy('time_to','asc')
                ->paginate(12);

        return view('home')
            ->with('posts', $posts)
            ->with('request', $requests);
    }
}
