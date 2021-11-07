<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    private const PAGINATE = 10;

    public function index()
    {
        $posts = Post::published()->latest()->paginate(self::PAGINATE);
        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        if (!$post->published) {
            abort(404);
        }
        return Inertia::render('Posts/Show', ['post' => $post]);
    }
}
