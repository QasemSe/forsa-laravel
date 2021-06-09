<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Degree;
use App\Models\Manager;
use App\Models\Post;
use App\Models\Skill;
use App\Models\Specialize;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashbaordController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $degrees = Degree::all();
        $specializes = Specialize::all();
        $universities = University::all();
        $skills = Skill::all();
        $companies = Company::all();
        $users = User::all();
        $posts = Post::all();
        $applicants = Applicant::all();
        return view('Manager.index')
            ->with('degrees', $degrees)
            ->with('specializes', $specializes)
            ->with('universities', $universities)
            ->with('skills', $skills)
            ->with('companies', $companies)
            ->with('users', $users)
            ->with('applicants', $applicants)
            ->with('degrees', $degrees)
            ->with('posts', $posts);
    }









    public function profile()
    {
        $manager = Auth::guard('manager')->user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:users,email,' . $manager->id;
        $this->validationRules["password"] = 'nullable|min:6';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view('Manager.profile.profile')
            ->with('validator', $validator)
            ->with('manager', $manager);
    }

    public function updateProfile(Request $request)
    {
        $manager = Auth::guard('manager')->user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:users,email,' . $manager->id;
        $this->validationRules["password"] = 'nullable|min:6';

        $request->validate($this->validationRules);

        $manager->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  $request->get('password') ? bcrypt($request->get('password')) : $manager->password,
        ]);
        Toastr::success(t('Success To Update Data'));
        return redirect()->route('profile');
    }
}
