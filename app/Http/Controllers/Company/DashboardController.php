<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\CompanyLink;
use App\Models\Post;
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
        $this->middleware('company');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $applicants = Applicant::orderBy('created_at', 'desc')->whereIn('post_id', $posts)->take(6)->get();


        $posts_count = Post::where('company_id', Auth::guard('company')->user()->id)->count();
        $applicants_count = Applicant::orderBy('created_at', 'desc')->whereIn('post_id', $posts)->count();

        return view('Company.index')
            ->with('posts_count', $posts_count)
            ->with('applicants_count', $applicants_count)
            ->with('applicants', $applicants);
    }

    public function profile()
    {
        $company = Auth::guard('company')->user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:companies,email,' . $company->id;
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["profile_image"] = 'nullable|image';
        $this->validationRules["banner_image"] = 'nullable|image';
        $this->validationRules["mobile_number"] = 'nullable|numeric';
        $this->validationRules["address"] = 'nullable';
        $this->validationRules["state"] = 'nullable';
        $this->validationRules["description"] = 'nullable';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view('Company.profile.profile')
            ->with('validator', $validator)
            ->with('company', $company);
    }

    public function updateProfile(Request $request)
    {
        $company = Auth::guard('company')->user();
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:companies,email,' . $company->id;
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["profile_image"] = 'nullable|image';
        $this->validationRules["banner_image"] = 'nullable|image';
        $this->validationRules["mobile_number"] = 'nullable|numeric';
        $this->validationRules["address"] = 'nullable';
        $this->validationRules["state"] = 'nullable';
        $this->validationRules["description"] = 'nullable';

        $request->validate($this->validationRules);

        $data = $request->except('status');
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $company->password;

        if ($request->file('profile_image')) {
            $data['profile_image'] = $this->uploadImage($request->profile_image, 'company_image');
        }
        if ($request->file('banner_image')) {
            $data['banner_image'] = $this->uploadImage($request->banner_image, 'company_image');
        }

        $company->update($data);

        if ($company->link) {
            $company->link->update($data);
        } else {
            $data['company_id'] = Auth::guard('company')->user()->id;
            CompanyLink::create($data);
        }

        Toastr::success(t('Success To Update Data'));
        return redirect()->back();
    }
}
