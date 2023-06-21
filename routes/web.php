<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCreateController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('posts/{post:id}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class , 'create'])->middleware('guest');
Route::post('register', [RegisterController::class , 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/', [PostController::class, 'store'])->middleware('auth');

Route::get('{post}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::patch('{post}', [PostController::class, 'update'])->middleware('auth');

Route::delete('{post}',[PostController::class, 'destroy'])->middleware('auth');


