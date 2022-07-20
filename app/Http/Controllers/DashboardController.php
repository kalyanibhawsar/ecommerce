<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class DashboardController extends Controller
{
    public function show_post(Request $req)
    {
        //----Get user name from user table by join---
        // $posts = Post::select('posts.*', 'users.name')
        //     ->join('users', 'users.id', '=', 'posts.user_id')
        //     ->get();
        //----------
        //$posts = Post::all();
        $user_id = $req->user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(5);
        return view('dashboard', ['posts' => $posts]);
    }
}
