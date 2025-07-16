<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $stateless = false;
    public function stateless()
    {
        $this->stateless = true;
        return $this;
    }
    public function googlelogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        $googleuser = Socialite::driver('google')->stateless();
        dd($googleuser);
    }
}
