<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantsResource;
use App\Http\Resources\PostDetailsResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Applicant;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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
                $user['access_token'] =  $user->createToken('user')->accessToken;
                $success_message = " تم تسجيل الدخول بنجاح ";
                return $this->sendResponse(new UserResource($user), $success_message);
            } else {
                return $this->sendError("كلمة المرور خاطئة");
            }
        } else {
            return $this->sendError("البيانات المدخلة غير صحيحة");
        }
    }

    // User Profile
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user['access_token'] = Str::substr($request->header('Authorization'), 7);
        return new UserResource($user);
    }

    // User Archive
    public function archive()
    {
        $applicants  = Applicant::where('user_id', Auth::user()->id)->paginate(5);
        return $this->sendResponse([
            'items' => ApplicantsResource::collection($applicants),
            'paginate' => paginate($applicants),
        ]);
    }

    // For all user Posts
    public function posts()
    {
        $posts = Post::where('status', 1)->paginate(5);
        return $this->sendResponse(
            [
                'items' => PostResource::collection($posts),
                'paginate' => paginate($posts),
            ]
        );
    }

    // For User Post Details
    public function postDetails($id)
    {
        $post = Post::where('id', $id)->where('status', 1)->first();
        if (!$post) {
            return $this->sendError("Not Found");
        }
        return $this->sendResponse(new PostDetailsResource($post));
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
}
