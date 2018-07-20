<?php

namespace App\Http\Controllers;

use AdamWathan\EloquentOAuth\Facades\OAuth;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function auth($provider)
    {
        return OAuth::authorize($provider);
    }

    public function callback($provider)
    {
        OAuth::login($provider, function ($user, $details) {
            $user->avatar = $details->avatar;
            $user->email = $details->email;
            $user->name = $details->full_name;
            $user->save();
        });

        return redirect('/home');
    }
}