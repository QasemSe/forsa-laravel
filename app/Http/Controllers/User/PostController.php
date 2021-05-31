<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Post;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
        return view('User.post.index')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->where('status', 1)->first();
        if (!$post) {
            return  redirect()->back();
        }
        
        $applicant = Applicant::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();

        return view('User.post.show')
            ->with('applicant', $applicant)
            ->with('post', $post);
    }


    public function applyNow(Request $request, $id)
    {
        $post = Post::where('id', $id)->where('status', 1)->first();
        if (!$post) {
            return  redirect()->back();
        }

        $this->validate($request, [
            'notes' => 'required|max:1500|string',
        ]);

        $applicant = Applicant::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
        if ($applicant) {
            Toastr::error(t('The Post is applied'));
        } else {
            Applicant::create([
                'user_id' => auth()->user()->id,
                'post_id' => $post->id,
                'notes' => $request->notes
            ]);
            Toastr::success(t('Success to Apply Post'));
        }
        return redirect()->route('me.post.index');
    }




    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->where('created_at', 'desc')->paginate(5);
        return view('User.post.search')
            ->with('search', $search)
            ->with('posts', $posts);
    }
}
