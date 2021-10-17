<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    private const PAGINATE = 20;

    public function index()
    {
        $posts = Post::with(['user'])->paginate(self::PAGINATE);
        return Inertia::render('Admin/Posts/Index', ['posts' => $posts]);
    }
}
