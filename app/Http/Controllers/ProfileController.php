<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profileprofile');
    }

    public function class()
    {
        return view('classprofile');
    }

    public function post()
    {
        return view('postprofile');
    }

    public function friend()
    {
        return view('friendprofile');
    }
}
