<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GoogleController extends Controller
{
    public function index()
    {
        return Socialite::driver('google')
            ->setScopes(['openid', 'profile', 'email'])
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }


    public function verify()
    {
        try {
            $guser = Socialite::driver('google')->user(); // no stateless()

            $user = User::updateOrCreate(
                ['email' => $guser->getEmail()],
                [
                    'google_id' => $guser->getId(),
                    'name' => $guser->getName(),
                    'google_token' => $guser->token,
                    'google_refresh_token' => $guser->refreshToken ?? null,
                    'google_avatar' => $guser->getAvatar(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed: ' . $e->getMessage());
        }
    }

    function randomPassword()
    {
        $alphabet = "!@#$^&()abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = '';
        $maxIndex = strlen($alphabet) - 1;  // Get max index

        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $maxIndex);          // Pass max index as int
            $pass .= $alphabet[$n];           // Concatenate characters
        }

        return $pass;
    }
}
