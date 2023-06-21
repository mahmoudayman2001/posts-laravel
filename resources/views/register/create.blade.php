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
    <h2>Registration Form</h2>
    <form action="/register" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{old('name')}}" required>
        @error('name')
        <p>{{$message}}</p>

        @enderror
            
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" required>
        @error('email')
        <p>{{$message}}</p>

        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <p>{{$message}}</p>

        @enderror
      </div>


      <div class="form-group">
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
   
   
  @endsection
