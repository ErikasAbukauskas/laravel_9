<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        // $post = Post::create($request->validated());
        // $post->addMediaFromRequest('image')->usingName('Spatie Media Library')->toMediaCollection();
        // $post->addMediaFromRequest('image')->usingName($post->title)->toMediaCollection();

        $post = Post::create($request->validated())
            ->addMediaFromRequest('image')->toMediaCollection();

        return to_route('posts.index');
    }
}
