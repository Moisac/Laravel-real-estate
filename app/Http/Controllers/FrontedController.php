<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use JavaScript;

class FrontedController extends Controller
{
    public function acasa() {

        $posts = Posts::orderBy('created_at', 'desc')->take(12)->get();

            $promoted = Posts::where([
                ['post_promote', 'Anunt promovat']
            ])->latest()->take(25)->get();

            JavaScript::put([
                'post' => Posts::all()
         ]);



        return view('frontend.home', compact('posts', 'promoted', 'post'));
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function ads() {

        $posts = Posts::orderBy('created_at', 'desc')->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        return view('frontend.ads', compact('posts', 'promoted'));
    }

    public function singleAd($id) {

        $post = Posts::findOrFail($id);
        $posts = Posts::orderBy('created_at')->take(3)->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(6)->get();

        return view('frontend.singleAd', compact('post', 'posts', 'promoted'));
    }

    public function userAds() {

        $posts = Posts::where('user_id',Auth::user()->id)->latest()->get();
        

        return view('frontend.userAds', compact('posts'));

    }

}
