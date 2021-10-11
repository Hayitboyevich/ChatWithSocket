<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {

        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser);

                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser);

                return redirect('/dashboard');
            }

        } catch (\Exception $exception) {
            dd('aji kuku');
        }
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function loginWithGoogle()
    {

        try {
            $user = Socialite::driver('google')->stateless()->user();
            $isUser = User::where('google_id', $user->id)->first();
//            dd($isUser);

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser);
                return redirect('/home');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => $user->password,
                ]);

                Auth::login($createUser);

                return redirect('/home');
            }

        } catch (\Exception $exception) {
            dd('aji kuku');
        }
    }
}
