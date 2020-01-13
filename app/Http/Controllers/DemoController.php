<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DemoController extends Controller
{
    public function userDemo() {

    }

    public function adminDemo() {

    }

    public function otherDemo() {

        $userRoles = Auth::user()->roles->pluck('name');
    
        if(!$userRoles->contains('Other')) {

            return redirect('/home');
        }

    }
}
