<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantsResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostResource;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class CompanyController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:companies,email',
            'password' => 'required',
        ]);



        $company = Company::where('email', $request->email)->first();
        if ($company) {
            if (Hash::check($request->password, $company->password)) {
                $company['access_token'] =  $company->createToken('company')->accessToken;
                $success_message = " تم تسجيل الدخول بنجاح ";
                return $this->sendResponse(new CompanyResource($company), $success_message);
            } else {
                return $this->sendError("كلمة المرور خاطئة");
            }
        } else {
            return $this->sendError("البيانات المدخلة غير صحيحة");
        }
    }


    public function profile(Request $request)
    {
        $company = Auth::guard('comapi')->user();
        $company['access_token'] = Str::substr($request->header('Authorization'), 7);
        return new CompanyResource($company);
    }


    public function archive()
    {
        $applicants  = Applicant::whereHas('post', function ($q) {
            $q->where('company_id', Auth::guard('comapi')->user()->id);
        })->paginate(5);

        return $this->sendResponse([
            'items' => ApplicantsResource::collection($applicants),
            'paginate' => paginate($applicants),
        ]);
    }


    public function posts()
    {
        $posts  = Post::where('company_id', Auth::guard('comapi')->user()->id)->paginate(5);

        return $this->sendResponse([
            'items' => PostResource::collection($posts),
            'paginate' => paginate($posts),
        ]);
    }
}
