<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; // <-- Add this line
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FacebookAuthController extends Controller
{
    //
    public function redirect()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try{
            $facebook_user = Socialite::driver('facebook')->user();
            $user=User::where('facebook_id',$facebook_user->getId())->first();
            if(!$user){
                $user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId(),
                    'picture' => $facebook_user->getAvatar(),
                    'password' => $facebook_user->token,
                ]);
            }
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }catch(\Throwable $th){
            dd('Something Wrong'.$th->getMessage());
        }
    }
}
