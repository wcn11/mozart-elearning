<?php

namespace App\Http\Controllers\Mentor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = '/mentor/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('mentor.guest:mentor', ['except' => 'logout']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('mentor');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('mentor.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }

    // public function redirectToProvider($driver){
    //     $config = [
    //         'client_id'    => '811390562363-4pkcimu6075a1ah28p8dqhdj105gq80f.apps.googleusercontent.com',
    //         'client_secret' => 'y5Eov7XU4GK8ua3I93i8CQwD',
    //         'redirect'     => 'http://localhost:8000/mentor/google/callback'
    //     ];
        
    //     Socialite::buildProvider(\Laravel\Socialite\Two\GoogleProvider::class, $config);
    //     return Socialite::driver($driver)->redirect();
    // }

    // public function handleProviderCallback($driver){
 
    //         // echo $driver;

    //         try {

    //             // $config = [
    //             //     'client_id'    => '811390562363-4pkcimu6075a1ah28p8dqhdj105gq80f.apps.googleusercontent.com',
    //             //     'client_secret' => 'y5Eov7XU4GK8ua3I93i8CQwD',
    //             //     'redirect'     => 'http://localhost:8000/mentor/google/callback'
    //             // ];
                
    //             // Socialite::buildProvider(\Laravel\Socialite\Two\GoogleProvider::class, $config);

    //             date_default_timezone_set('Asia/Jakarta');

    //             $m = Mentor::max("id_mentor");
    //             $s = substr($m, strrpos($m, "-")+1)+1;

    //             $std = Socialite::driver($driver)->user();

    //             $create = Mentor::firstOrCreate([
    //                 'email' => $std->getEmail()
    //             ],[
    //                 'id_mentor' => "MNTR-".$s,
    //                 'socialite_id' => $std->getId(),
    //                 'socialite_name' => $driver,
    //                 'name' => $std->getName(),
    //                 'foto' => $std->getAvatar(),
    //                 'email_verified_at' => now()
    //             ]
    //         );

    //         Auth::guard('mentor')->login($create, true);

    //         return redirect()->route("mentor.dashboard");
            
    //         } catch (\Exception $e) {
    //             return $e;
    //         }
    // }
}
