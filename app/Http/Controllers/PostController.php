<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublishedPosts;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::published()->latest()->paginate(10);
        return Inertia::render('Posts/index', ['posts' => $posts]);
    }
}
