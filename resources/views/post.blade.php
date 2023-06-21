<!DOCTYPE html>
@extends('layout')
   
   @section('content')
   
    <article>
      <h1>{{$post->title}}</h1>

      
      <p>  By <a href="/?authors={{$post->author->name}}">{{$post->author->name}}</a></p>

      <p><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
      <div>
      {!!$post->body!!} 
      </div>
      <img src="{{asset( str_replace('public/', 'storage/', $post->photo))}}" alt="">

    </article>

      <a href="/">go back...</a>
  @endsection
