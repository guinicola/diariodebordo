<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $requests)
    {


        $posts = Post::query()
                ->orderBy('date','desc')
                ->orderBy('time_to','desc')
                ->paginate(10);

        return view('home')
            ->with('posts', $posts)
            ->with('request', $requests);
    }
}
