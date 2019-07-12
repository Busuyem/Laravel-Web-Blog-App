<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('front.home');
    }

    public function contact(){
        return view('front.contact');
    }

    public function About(){
        return view('front.about');
    }
}
