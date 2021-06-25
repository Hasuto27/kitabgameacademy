<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;


class PageController extends Controller
{

    public function login()
    {
        return view('notfound');
    }

    public function register()
    {
        return view('notfound');
    }

    public function programme()
    {
        return view('programme');
    }

    public function gametechnology()
    {
        return view('gametechnology');
    }

    public function gameproduction()
    {
        return view('gameproduction');
    }

    public function gameart()
    {
        return view('gameart');
    }

        public function videoloader()
    {
           return view('/videos/video1');
    }

        public function videoloader2()
    {
           return view('/videos/video2');
    }

        public function videoloader3()
    {
           return view('/videos/video3');
    }

    public function videoloader4()
    {
           return view('/videos/video4');
    }

    public function notfound()
    {
        return view('notfound');
    }

    public function dashboard()
    {
        return view('lecture.dashboard');
    }

    public function gametechnologybeginner()
    {
        return view('gametechnologybeginner');
    }


    public function checkout()
    {
        return view('checkout');
    }

    public function profile(){
        return view('/user/account');
    }


}
