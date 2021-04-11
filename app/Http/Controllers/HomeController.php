<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dash()
    {
        return view('posts.index');

    }

    public function contact()
    {
        return view('users.index');
    }
}
