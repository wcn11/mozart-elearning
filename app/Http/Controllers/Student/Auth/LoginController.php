<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Student;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest:student', ['except' => 'logout']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('student.auth.login');
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

    public function redirectToProvider($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver){
        try {
            date_default_timezone_set('Asia/Jakarta');

            $m = Student::max("id_student");
            $s = substr($m, strrpos($m, "-")+1)+1;

            $std = Socialite::driver($driver)->user();

            $create = Student::firstOrCreate([
                'email' => $std->getEmail()
            ],[
                'id_student' => "STD-".$s,
                'socialite_id' => $std->getId(),
                'socialite_name' => $driver,
                'name' => $std->getName(),
                'foto' => $std->getAvatar(),
                'email_verified_at' => now()
            ]
        );

        Auth::guard('student')->login($create, true);
        Session::flash("login", auth()->login($create, true));
        return redirect()->route("student.dashboard");
        
        
        } catch (\Exception $e) {
            return $e;
        }
    }
    // public function redirectPath()
    // {
    //     if (method_exists($this, 'redirectTo')) {
    //         return $this->redirectTo();
    //     }

    //     return property_exists($this, 'redirectTo') ? $this->redirectTo : '/student';
    // }

}