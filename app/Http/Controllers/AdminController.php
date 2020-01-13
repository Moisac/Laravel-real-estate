<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index() {

        $posts = Posts::where('user_id',Auth::user()->id)->latest()->take(4)->get();;

        $promoted = Posts::where([
            ['user_id',Auth::user()->id],
            ['post_promote', 'Anunt promovat']
        ])->get();


        return view('admin.panel', compact('posts', 'promoted'));

    }

}
