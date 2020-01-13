<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class ContactMailController extends Controller
{
    public function sendContact(Request $request) {

        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        );

        Mail::to('moisaclaudiu2309@gmail.com')->send(new SendContactMail($data));
        Alert::success('Mesajul tau a fost trimis', 'Iti multumim ca ne-ai contactat!');
        return back();
    }
}
