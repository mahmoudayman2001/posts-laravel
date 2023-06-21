<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use Illuminate\Validation\Rule;


class apiPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->filter($request->only(['search', 'category', 'author']))->simplePaginate(2);

        return response()->json(['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return response()->json(['post' => $post]);
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'photo' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required|min:20',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['photo'] = $request->file('photo')->store('public/photos');

        Post::create($attributes);

        return response()->json(['message' => 'Post created successfully'], Response::HTTP_CREATED);
    }

    public function edit(Post $post)
    {
        if (auth()->guest()) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'photo' => 'image',
            'excerpt' => 'required',
            'body' => 'required|min:20',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if ($request->hasFile('photo')) {
            $attributes['photo'] = $request->file('photo')->store('public/photos');
        }

        $post->update($attributes);

        return response()->json(['message' => 'Post updated successfully']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
