<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('error', 'Your email or password are not correct');
        }
    }

    function adminlogin()
    {
        return view('auth.admin_login');
    }

    public function redirectToProvider($driver)
    {
        if (! $this->isProvierAllowed($driver)) {
        return $this->sendFailedLoginResponse($driver);
        }
    }
}
