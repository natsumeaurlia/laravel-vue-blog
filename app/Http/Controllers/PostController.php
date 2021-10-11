<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    private const PAGINATE = 10;

    public function index()
    {
        $posts = Post::published()->latest()->paginate(self::PAGINATE);
        return Inertia::render('Posts/index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/show', ['post' => $post]);
    }
}
