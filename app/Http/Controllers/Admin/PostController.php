<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(40);
        return Inertia::render('Admin/Posts/Index', ['posts' => $posts]);
    }
}
