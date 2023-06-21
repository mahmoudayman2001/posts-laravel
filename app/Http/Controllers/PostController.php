<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){

    return view('posts', [
        'posts' => Post::latest()->filter
        (request(['search', 'category', 'author']))
        ->simplePaginate(2),
    ]);
    
    }

    public function show(Post $post){

        return view('post',[
            'post'=>$post
        ]);

    }

    public function create(Post $post){

        if(auth()->guest()){
            abort(404);
        }

        return view('create');

    }

    public function store(){

    //    $path=  request()->file('image')->store('public/images');
    //     return 'done: ' . $path ;
        $attributes=  request()->validate([
            'title'=> 'required|max:255',
            'slug'=>['required', Rule::unique('posts', 'slug')],
            'photo'=>'required|image',
            'excerpt'=> 'required',
            'body'=>'required|min:20',
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id']= auth()->id();
        $attributes['photo'] = request()->file('photo')->store('public/photos');

      Post::create($attributes);

        return redirect('/');
       
    }

    public function edit(Post $post){

        if(auth()->guest()){
            abort(404);
        }

        return view('edit', ['post'=> $post]);

    }

    public function update(Post $post){
        $attributes=  request()->validate([
            'title'=> 'required|max:255',
            'slug'=>['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'photo'=>'image',
            'excerpt'=> 'required',
            'body'=>'required|min:20',
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);

        if(isset($attributes['photo'])){
            $attributes['photo'] = request()->file('photo')->store('public/photos');
        }

        $post->update($attributes);

        return back();

    }

    public function destroy (Post $post){
       
        $post->delete();
        return back();

    }


}
