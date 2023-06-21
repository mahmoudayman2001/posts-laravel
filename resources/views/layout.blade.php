<!DOCTYPE html>
<html lang="">
    <title>posts</title>
    <link rel="stylesheet" href="css/posts.css">

    <style>
      .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .pagination a {
      color: #333;
      display: inline-block;
      padding: 8px 16px;
      text-decoration: none;
      border: 1px solid #ddd;
      background-color: #f7f7f7;
      margin-right: 5px;
    }

    .pagination a.active {
      background-color: #4CAF50;
      color: white;
      border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {
      background-color: #ddd;
    }
    </style>
  <body>
    
   @yield('content')
  </body>
</html>
