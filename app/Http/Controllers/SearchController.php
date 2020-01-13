<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class SearchController extends Controller
{
    public function search(Request $request) {
        $posts = Posts::where([
            ['post_location', $request->input('postLocation')],
            ['post_type', $request->input('postType')],
            ['building_type', $request->input('buildingType')],
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

        return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function garsoniere(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Garsoniera'],
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds');; 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function garsoniereInchiriat(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Garsoniera'],
            ['post_type', 'De inchiriat']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function garsoniereVanzare(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Garsoniera'],
            ['post_type', 'De vanzare']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function apartamente(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Apartament'],
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function apartamenteVanzare(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Apartament'],
            ['post_type', 'De vanzare']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function apartamenteInchiriat(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Apartament'],
            ['post_type', 'De inchiriat']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function case(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Casa'],
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function caseVanzare(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Casa'],
            ['post_type', 'De vanzare']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }

    public function caseInchiriat(Request $request) {
        $posts = Posts::where([
            ['building_type', 'Casa'],
            ['post_type', 'De inchiriat']
        ])->latest()->get();

        $promoted = Posts::where([
            ['post_promote', 'Anunt promovat']
        ])->latest()->take(25)->get();

        if ($posts->isEmpty()) { 
            return view('frontend.noAds'); 
        } else {

            return view('frontend.ads', compact('posts', 'promoted'));
        }
    }
}
