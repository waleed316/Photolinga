<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function account()
    {
        return view('settings.account');
    }

    public function security()
    {
        return view('settings.security');
    }

    public function updateAccount()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $user = auth()->user();
        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        $user->updateContactInformation([
            'skype' => request('skype'),
            'contact_number' => request('contact_number'),
            'address' => request('address'),
            'city' => request('city'),
            'country' => request('country')
        ]);
//        $contactInformation = auth()->user()->contact_information;
//        $contactInformation->skype = \request('skype');
//        $contactInformation->contact_number = \request('contact_number');
//        $contactInformation->address = \request('address');
//        $contactInformation->city = \request('city');
//        $contactInformation->country = \request('country');
//        $contactInformation->save();
        if ( request()->wantsJson() ) {
            return response($user, 201);
        }

        return redirect()->back();
    }
}
