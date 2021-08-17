<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use BeyondCode\EmailConfirmation\Traits\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/register-step2';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        if (Auth::attempt(['email' => $request["email"], 'password' => $request["password"]], $request["remember"])) {
            $user = User::where('email', $request["email"])->first();
            if( $user && Hash::check($request['password'], $user->password) )
            {
                if($user->active){
                    Auth::login($user);
                    // if (Auth::user()->role()->where('title', 'Administrator')->count() > 0) {
                    //     echo 'role:'.$user->role;
                    //     exit;
                    // }
                    // var_dump($request->listingid_param_login);
                    // exit;
                    $user->update([
                        'last_login_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    foreach ($user->role as $singleRole){
                        $role = $singleRole->title;
                    }
                    if($role == 'Administrator'){
                        return response()->json(['state'=>'admin_login']);
                    }
                    else{
                        if ($user->isVerified == true){
                            return response()->json(['state'=>'login', 'role' => $role]);
                        }
                        else{
                            return response()->json(['state'=>'verify', 'phone' => $user->phone ]);
                        }

                    }
                }
                else{
                    Auth::logout($user);
                    return response()->json(['state'=>'block']);
                }
            }
            else
            {
                return response()->json(['state'=>'error']);
            }
        }
        
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
   
            $finduser = User::where('google_id', $user->id)->first();
   
            if($finduser){
   
                Auth::login($finduser);
                $finduser->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                ]);
                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
   
            }else{
                if (User::where('email', $user->email)->count() > 0) {
                    $newUser = User::where('email', $user->email)->first();
                    $newUser->google_id = $user->id;
                    $newUser->save();
                    Auth::login($newUser);
                    return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
                } else {
                    $name = explode(" ", $user->name);
                    if(!is_null($name[0])){
                        $first_name = $name[0];
                    }
                    else{
                        $first_name = "";
                    }
                    if(!is_null($name[1])){
                        $last_name = $name[1];
                    }
                    else{
                        $last_name = "";
                    }
                    $newUser = User::create([
                        'name' => $first_name,
                        'surname' => $last_name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => md5(rand(1, 10000))
                    ]);
                    $newUser->role()->sync([4]);
      
                    Auth::login($newUser);
                    return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
                }
                //return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    // vk login
    public function redirectToVk()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function handleVkCallback()
    {
        try {

            $user = Socialite::with('vkontakte')->user();

            $finduser = User::where('vk_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
                $finduser->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                ]);
                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
            } else {
                if(User::where('email', $user->email)->count() > 0){
                    $newUser = User::where('email', $user->email)->first();
                    $newUser->vk_id = $user->id;
                    $newUser->save();
                    Auth::login($newUser);
                    return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
                    // return redirect('/')->with('error_message', 'Email is existing');;
                }
                else{
                    $name = explode(" ", $user->name);
                    if(!is_null($name[0])){
                        $first_name = $name[0];
                    }
                    else{
                        $first_name = "";
                    }
                    if(!is_null($name[1])){
                        $last_name = $name[1];
                    }
                    else{
                        $last_name = "";
                    }
                    $newUser = User::create([
                        'name' => $first_name,
                        'surname' => $last_name,
                        'email' => $user->email,
                        'vk_id' => $user->id,
                        'password' => md5(rand(1, 10000))
                    ]);
    
                    $newUser->role()->sync([4]);
    
                    Auth::login($newUser);
                    return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
                }
                //return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    // vk login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
                $finduser->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                ]);
                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
            } else {
                if (User::where('email', $user->email)->count() > 0) {
                    $newUser = User::where('email', $user->email)->first();
                    $newUser->facebook_id = $user->id;
                    $newUser->save();
                    Auth::login($newUser);
                    return redirect()->route(
                        'profile',
                        app()->getLocale()
                    );
                } else {
                    $name = explode(" ", $user->name);
                    if(!is_null($name[0])){
                        $first_name = $name[0];
                    }
                    else{
                        $first_name = "";
                    }
                    if(!is_null($name[1])){
                        $last_name = $name[1];
                    }
                    else{
                        $last_name = "";
                    }
                    $newUser = User::create([
                        'name' => $first_name,
                        'surname' => $last_name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => md5(rand(1, 10000))
                    ]);

                    $newUser->role()->sync([4]);

                    Auth::login($newUser);
                    return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
                }
                //return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
}
