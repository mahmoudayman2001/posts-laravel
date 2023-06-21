@extends('layout')
   
   @section('content')
   @auth
   <div>
    <span>welcome {{auth()->user()->name}}</span>
    <form action="/logout" method="POST">
    @csrf
    <button type="submit">Log Out</button>
    </form>


    @else
    <a href="/register">register</a>
    <a href="/login">login</a>
  </div>
   @endauth
     
  
   <h1>My Posts</h1>


   <div>
    <form action="" method="GET">

      <input type="text" name="search" placeholder="search" value="{{request('search')}}">
    </form>

  </div>

  
@foreach ($posts as $post)
    <article>
        <a href="/posts/{{$post->id}}">
      <h1>
       {!!$post->title!!}
    </h1>
</a>

<p>  By <a href="/?author={{$post->author->name}}">{{$post->author->name}}</a></p>

<p><a href="/?category={{$post->category->slug}}">{{$post->category->name}}</a></p>
      <p>{!!$post->excerpt!!}</p>  

      <img src="{{asset( str_replace('public/', 'storage/', $post->photo))}}" alt="">

      @auth
        
     

      <a href="{{$post->id}}/edit">Edit</a>
      <form action="/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
      </form>
      @endauth
       
    </article>
    <hr>

    @endforeach
@auth
<a href="/create">Create Post</a>
@endauth
   

     
    <div class="pagination">
      {{ $posts->links() }}
    </div>
    @endsection
  
