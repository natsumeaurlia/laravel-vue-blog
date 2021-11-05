<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    private const PAGINATE = 20;

    public function index()
    {
        $posts = Post::with(['user'])->paginate(self::PAGINATE);
        return Inertia::render('Admin/Posts/Index', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('Admin/Posts/Create');
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $data = array_merge($request->validated(), ['user_id' => Auth::id()]);
        if (!$post->fill($data)->save()) {
            return redirect()->route('admin.post.index')->with('failed-message', 'Create Failed');
        }
        return redirect()->route('admin.post.index')->with('success-message', 'Create Successful');
    }
}
