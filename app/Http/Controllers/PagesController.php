<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PagesController extends Controller
{
    public function home(){

        $users = User::all();
        $posts = Post::orderBy('id', 'desc')->paginate(15);
        return view('back.index', compact('posts', 'users'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function About(){
        return view('front.about');
    }
}
