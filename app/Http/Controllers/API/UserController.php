<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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


    public function profile(Request $request)
    {


        $user = Auth::user();
        $user['access_token'] = Str::substr($request->header('Authorization'), 7);
        return new UserResource($user);
    }
}
