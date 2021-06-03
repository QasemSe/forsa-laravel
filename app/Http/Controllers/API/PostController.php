<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
}
