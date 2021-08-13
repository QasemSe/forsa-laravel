<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantsResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostDetailsResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserPostResource;
use App\Http\Resources\UserResource;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user['access_token'] = $user->createToken('user')->accessToken;
                $success_message = " تم تسجيل الدخول بنجاح ";
                if ($user) {
                    return $this->sendResponse(new UserResource($user), $success_message);
                } else {
                    return $this->sendEmptyResponse();
                }

            } else {
                return $this->sendError("كلمة المرور خاطئة");
            }
        } else {
            return $this->sendError("البيانات المدخلة غير صحيحة");
        }
    }


    public function register(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create($data);
        $user['access_token'] = $user->createToken('user')->accessToken;

        if ($user) {
            $success_message = t('Success To Save Data');
            return $this->sendResponse(new UserResource($user), $success_message);
        }
    }


    // User Profile
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user['access_token'] = Str::substr($request->header('Authorization'), 7);
        if ($user) {
            return $this->sendResponse(new UserResource($user));
        } else {
            return $this->sendEmptyResponse();
        }
    }


    public function updateProfile(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id . ',id',
            'password' => 'nullable|min:8',
            'avarage' => 'nullable|numeric',
            'specialize_id' => 'nullable|exists:specializes,id',
            'degree_id' => 'nullable|exists:degrees,id',
            'university_id' => 'nullable|exists:universities,id',
            'skills_id' => 'required|min:1|exists:skills,id',
        ]);

        $user = Auth::user();
        $user->update($data);
        if ($data['skills_id']) {
            $user->skills()->sync($data['skills_id']);
        }

        $user['access_token'] = Str::substr($request->header('Authorization'), 7);

        if ($user) {
            $success_message = t('Success To Update Data');
            return $this->sendResponse(new UserResource($user), $success_message);
        }
    }


    // User Archive
    public function archive()
    {
        $applicants = Applicant::where('user_id', Auth::user()->id)->paginate(5);
        if ($applicants->count() > 0) {
            return $this->sendResponse([
                'items' => ApplicantsResource::collection($applicants),
                'paginate' => paginate($applicants),
            ]);
        }
        return $this->sendEmptyResponse();
    }


    // For all user Posts
    public function posts()
    {
        $posts = Post::where('status', 1)->paginate(5);
        if ($posts->count() > 0) {
            return $this->sendResponse([
                'items' => UserPostResource::collection($posts),
                'paginate' => paginate($posts),
            ]);
        } else {
            return $this->sendEmptyResponse();
        }
    }

    // For User Post Details
    public function postDetails(Request $request)
    {
        $post = Post::where('id', $request->post_id)->where('status', 1)->first();
        if (!$post) {
            return $this->sendError("Not Found");
        }
        if ($post) {
            return $this->sendResponse(new PostDetailsResource($post));
        } else {
            return $this->sendEmptyResponse();
        }

    }

    // For Make applicant
    public function applicant(Request $request)
    {
        $post = Post::where('id', $request->post_id)->where('status', 1)->first();
        if (!$post) {
            return $this->sendError(t("Not Found"));
        }
        $this->validate($request, [
            'notes' => 'required|max:1500|string',
        ]);

        $applicant = Applicant::where('user_id', Auth::user()->id)->where('post_id', $post->id)->first();
        if ($applicant) {
            return $this->sendError(t('The Post is applied'));
        } else {
            $applicant = Applicant::create([
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'notes' => $request->notes,
                'status' => 'review'
            ]);
            return $this->sendResponse(new ApplicantsResource($applicant), t('Success to Apply Post'));
        }
    }

    public function showApplicant(Request $request)
    {
        $applicant = Applicant::where('user_id', Auth::user()->id)->where('id', $request->applicant_id)->first();
        if (!$applicant) {
            return $this->sendError("Not Found");
        }
    }


    public function showCompany(Request $request)
    {
        $company = Company::find($request->company_id);
        if (!$company) {
            return $this->sendError("Not Found");
        }
        if ($company) {
            return new CompanyResource($company);
        }
    }
}
