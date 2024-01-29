<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            $user = auth()->user();

            if ($user->type == 'super-admin') {
                return redirect()->route('super.admin.dashboard');
            } else if ($user->type == 'doctor') {
                $membership = $user->membership;
                

                if ($membership && $membership->expire_date > now()) {
                    return redirect()->route('doctor.dashboard');
                } else {
                    auth()->logout();
                    return redirect()->route('login')->with('error', 'Your membership plan is expired or you are not an active member.');
                }
            } else if ($user->type == 'patient') {
                return redirect()->route('patient.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid Credentials.');
        }
    }

}