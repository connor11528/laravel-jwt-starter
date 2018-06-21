<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    /**
     * @param $provider
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getSocialRedirect($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\InvalidArgumentException $e) {
            return redirect('/login');
        }
    }

    /**
     * @param $provider
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getSocialCallback($provider)
    {

        $socialUser   = Socialite::driver($provider)->user();
        $existingUser = User::where('email', '=', $socialUser->email)->first();

        if (empty($existingUser)) {
            $newUser                      = new User();
            $newUser->name                = $socialUser->getName();
            $newUser->email               = $socialUser->getEmail();
            $newUser->avatar              = $socialUser->getAvatar();
            $newUser->{$provider . '_id'} = $socialUser->getId();
            $newUser->save();

            Auth::login($newUser);
        } else if ($existingUser && $existingUser[$provider . '_id'] == null) {
            $existingUser{$provider . '_id'} = $socialUser->getId();
            $existingUser->save();
            Auth::login($existingUser);
        } else {
            Auth::login($existingUser);
        }

        return redirect('/');
    }
}
