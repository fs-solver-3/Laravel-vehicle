<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function VerifyEmail($token = null)
    {
        if ($token == null) {

            session()->flash('message', trans('message.invalid_login_attempt'));

            return redirect()->route('home', app()->getLocale());
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user == null) {

            session()->flash('message', trans('message.invalid_login_attempt'));

            return redirect()->route('home', app()->getLocale());
        }

        $user->update([

            // 'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''

        ]);

        session()->flash('message', trans('message.account_active'));

        return redirect()->route('profile', app()->getLocale());
    }
}