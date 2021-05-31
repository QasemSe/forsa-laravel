<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
    protected $redirectTo = 'me/posts';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:manager')->except('logoutManager');
        $this->middleware('guest:company')->except('logoutCompany');
    }




    // Manager

    public function logoutManager(Request $request)
    {
        Auth::guard('manager')->logout();

        return redirect()->route('showManagerLogin');
    }


    public function showManagerLogin()
    {
        return view('auth.manager.manager_login');
    }

    public function loginManager(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:managers,email',
            'password' => 'required',
        ]);


        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('dashboard.index');
        }

        return back()->withInput($request->only('email', 'remember'));
    }











    // company/
    public function logoutCompany(Request $request)
    {
        Auth::guard('company')->logout();

        return redirect()->route('showCompanyLogin');
    }

    public function showCompanyLogin()
    {
        return view('auth.company.company_login');
    }


    public function loginCompany(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:companies,email',
            'password' => 'required',
        ]);


        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('myCompany.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function showRegisterCompany()
    {
        return view('auth.company.company_register');
    }


    public function registerCompany(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:companies,email',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::guard('company')->login($company);

        return redirect()->route('myCompany.dashboard');
    }
}
