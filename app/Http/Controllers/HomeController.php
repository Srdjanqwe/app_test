<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function dash()
    {
        return view('dash',[
            'posts'=> BlogPost::all()->where('is_published', false)
            ]);

        // $post->update([
        //     'title' => $request->title,
        //     'contet' => $request->content,
        //     'is_published' => $request->has('is_published')
        // ]);

    }

    public function contact()
    {
        return view('contact',['users'=> User::all()]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
