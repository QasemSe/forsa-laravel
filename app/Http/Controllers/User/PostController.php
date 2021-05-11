<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
        return view('User.post.index')->with('posts', $posts);
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
