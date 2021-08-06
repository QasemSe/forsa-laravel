<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantsResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostApplicants;
use App\Http\Resources\PostResource;
use App\Http\Resources\ShowApplicantsResource;
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

        if ($applicants->count() > 0) {
            return $this->sendResponse([
                'items' => ApplicantsResource::collection($applicants),
                'paginate' => paginate($applicants),
            ]);
        } else {
            return $this->sendEmptyResponse();
        }
    }


    public function posts()
    {
        $posts  = Post::where('company_id', Auth::guard('comapi')->user()->id)->paginate(5);
        if ($posts->count() > 0) {
            return $this->sendResponse([
                'items' => PostResource::collection($posts),
                'paginate' => paginate($posts),
            ]);
        } else {
            return $this->sendEmptyResponse();
        }
    }


    public function applicantStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:review,accepted,canceled',
            'applicant_id' => 'required|exists:applicants,id'
        ]);

        $applicant  = Applicant::whereHas('post', function ($q) {
            $q->where('company_id', Auth::guard('comapi')->user()->id);
        })->where('id', $request->applicant_id)->first();

        if (!$applicant) {
            return $this->sendError(t("Not Found"));
        }
        if ($applicant) {
            $applicant->update([
                'status' => $request->status,
            ]);
            return $this->sendResponse(new ApplicantsResource($applicant), t('Success To Chnage Status'));
        } else {
            return $this->sendError(t("Not Found"));
        }
    }

    public function showApplicant(Request $request)
    {
        $applicant  = Applicant::whereHas('post', function ($q) {
            $q->where('company_id', Auth::guard('comapi')->user()->id);
        })->where('id', $request->applicant_id)->first();

        if (!$applicant) {
            return $this->sendError("Not Found");
        }
        if ($applicant) {
            return $this->sendResponse(new ShowApplicantsResource($applicant));
        } else {
            return $this->sendEmptyResponse();
        }
    }


    //posts//
    public function createPost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'expire_date' => 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d'),
            'skills_id' => 'required|min:1|exists:skills,id',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $data['company_id'] = Auth::guard('comapi')->user()->id;
        $post = Post::create($data);
        $post->skills()->sync($request->skills_id);
        $success_message = t('Success To Save Data');
        return $this->sendResponse(new PostResource($post), $success_message);
    }

    public function editPost(Request $request)
    {
        $company_id = Auth::guard('comapi')->user()->id;
        $post  = Post::where('company_id',$company_id)->where('id', $request->post_id)->first();

        if (!$post) {
            return $this->sendError("Not Found");
        }
        $this->validate($request, [
            'title' => 'required',
            'expire_date' => 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d'),
            'skills_id' => 'required|min:1|exists:skills,id',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $data['company_id'] = Auth::guard('comapi')->user()->id;
        $post->update($data);
        $post->skills()->sync($request->skills_id);
        $success_message = t('Success To Update Data');
        return $this->sendResponse(new PostResource($post), $success_message);
    }

    public function deletePost(Request $request)
    {
        $company_id = Auth::guard('comapi')->user()->id;

        $post  = Post::where('company_id', $company_id)->where('id', $request->post_id)->first();
        if (!$post) {
            return $this->sendError("Not Found");
        }

        $post->delete($post->id);
        $success_message = t('Success To Delete Data');
        return $this->sendResponse(null, $success_message);
    }

    public function showPostApplicants(Request $request)
    {
        $company_id = Auth::guard('comapi')->user()->id;
        $post  = Post::where('company_id',$company_id )->where('id', $request->post_id)->first();
        if (!$post) {
            return $this->sendError("Not Found");
        }
        return $this->sendResponse(new PostApplicants($post));
    }
}
