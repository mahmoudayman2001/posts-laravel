<!DOCTYPE html>

<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #45a049;
    }

    .form-group .error-message {
      color: red;
      margin-top: 5px;
    }
  </style>
@extends('layout')
   
   @section('content')

   <div class="container">
    <h2>Edit Post :{{ $post->title}}</h2>
    <form action="/{{$post->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="form-group">
        <label for="name">title</label>
        <input type="text" id="title" name="title"  :value="(old('title'), $post->title)">
      </div>

      <div class="form-group">
        <label for="slug">slug</label>
        <input type="text" id="slug" name="slug" required>
        @error('slug')
        <p>{{$message}}</p> 
        @enderror
      </div>

      <div class="form-group">
        <label for="photo">photo</label>
        <input type="file" id="photo" name="photo"  required>
      </div>


      <div class="form-group">
        <label for="excerpt">excerpt</label>
        <textarea name="excerpt" id="excerpt" cols="52" rows="10" value="{{old('excerpt')}}"></textarea>
        @error('excerpt')
        <p>{{$message}}</p> 
        @enderror
      </div>

      <div class="form-group">
        <label for="body">body</label>
        <textarea name="body" id="body" cols="52" rows="10" value="{{old('body')}}"></textarea>
        @error('body')
        <p>{{$message}}</p> 
        @enderror
      </div>

      <div class="form-group">
        <label for="category_id">category</label>
        <select name="category_id" id="category">

          @foreach (\App\Models\Category::all() as $category )
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
          


        </select>
       
      </div>


      <div class="form-group">
        <button type="submit">Edit Post</button>
      </div>
    </form>
  </div>
   
   
  @endsection
