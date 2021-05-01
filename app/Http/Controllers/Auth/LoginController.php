<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest:manager')->except('logout');
    }




    public function showManagerLogin()
    {
        return view('auth.manager_login');
    }

    public function loginManager(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:managers,email',
            'password' => 'required',
        ]);


        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/manager/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }


    public function logout(Request $request)
    {
        Auth::guard('manager')->logout();
        return redirect()->route('showManagerLogin');
    }
}
