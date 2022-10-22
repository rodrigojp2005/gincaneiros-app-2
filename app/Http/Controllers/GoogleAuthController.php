<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; // <-- Add this line
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
    //dd($google_user->getId());
    //get picture google avatar
    //$google_user->getAvatar();
    //google user picture
        
     //dd($google_user);

    $google_user = Socialite::driver('google')->user();

    try {
        $google_user = Socialite::driver('google')->user();
      //  dd($google_user);
        $user=User::where('google_id',$google_user->getId())->first();
      //  dd($user);
            if(!$user){
                $new_user=User::create([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'google_id'=>$google_user->getId(),
                    'picture'=>$google_user->getAvatar(),
                    'password'=>$google_user->token,
                    //'password'=>bcrypt('12345678')
                    ]); 
                Auth::login($new_user);
                return redirect()->intended('/dashboard');
            }else{
                Auth::login($user);
                return redirect()->intended('/create');
            }
        } catch (\Throwable $th){
            dd('Something Wrong: '.$th->getMessage());
        }
    }
}
