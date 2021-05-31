<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Degree;
use App\Models\Post;
use App\Models\Skill;
use App\Models\Specialize;
use App\Models\University;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


        $applicants = Applicant::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->take(6)->get();
        $applicants_review_count = Applicant::where('user_id', Auth::user()->id)->where('status', 'review')->count();
        $applicants_accepted_count = Applicant::where('user_id', Auth::user()->id)->where('status', 'accepted')->count();
        $applicants_caceled_count = Applicant::where('user_id', Auth::user()->id)->where('status', 'canceled')->count();

        return view('User.index')
            ->with('applicants_review_count', $applicants_review_count)
            ->with('applicants_accepted_count', $applicants_accepted_count)
            ->with('applicants_caceled_count', $applicants_caceled_count)
            ->with('applicants', $applicants);
    }

    public function profile()
    {
        $user = Auth::user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["image"] = 'nullable|image';
        $this->validationRules["email"] = 'required|unique:users,email,' . $user->id;
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["mobile_number"] = 'required|numeric';
        $this->validationRules["avarage"] = 'required|numeric';
        $this->validationRules["specialize_id"] = 'required|exists:specializes,id';
        $this->validationRules["degree_id"] = 'required|exists:degrees,id';
        $this->validationRules["university_id"] = 'required|exists:universities,id';
        $this->validationRules["skills_id"] = 'required|min:1|exists:skills,id';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $degrees = Degree::all();
        $universities = University::all();
        $specializes = Specialize::all();
        $skills = Skill::all();

        return view('User.profile.profile')
            ->with('degrees', $degrees)
            ->with('skills', $skills)
            ->with('universities', $universities)
            ->with('specializes', $specializes)
            ->with('validator', $validator)
            ->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["image"] = 'nullable|image';
        $this->validationRules["email"] = 'required|unique:users,email,' . $user->id;
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["mobile_number"] = 'required|numeric';
        $this->validationRules["avarage"] = 'required|numeric';
        $this->validationRules["specialize_id"] = 'required|exists:specializes,id';
        $this->validationRules["degree_id"] = 'required|exists:degrees,id';
        $this->validationRules["university_id"] = 'required|exists:universities,id';
        $this->validationRules["skills_id"] = 'required|min:1|exists:skills,id';

        $request->validate($this->validationRules);


        $data = $request->all();
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;
        if ($request->file('image')) {
            $data['image'] = $this->uploadImage($request->image, 'users_image');
        }
        $user->update($data);
        $user->skills()->sync($request->skills_id);


        Toastr::success(t('Success To Update Data'));
        return redirect()->route('me.profile');
    }
}
