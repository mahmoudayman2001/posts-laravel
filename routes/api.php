<?php

use App\Http\Controllers\apiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts", [apiPostController::class, 'index']);
Route::get('posts/{post:id}', [apiPostController::class, 'show']);


Route::post('/create', [apiPostController::class, 'store'])->middleware('auth');

Route::get('{post}/edit', [apiPostController::class, 'edit'])->middleware('auth');
Route::patch('{post}', [apiPostController::class, 'update'])->middleware('auth');

Route::delete('{post}',[apiPostController::class, 'destroy'])->middleware('auth');
