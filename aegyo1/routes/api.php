<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

Route::get('/category',[CategoryController::class,'index']);
Route::post('/create_category',[CategoryController::class,'store']);
Route::put('/edit_category/{id}',[CategoryController::class,'update']);
Route::delete('/delete_category/{id}',[CategoryController::class,'destroy']);

Route::get('/article',[ArticleController::class,'index']);
Route::get('article/{id}', [ArticleController::class, 'getById']);
Route::post('/create_article',[ArticleController::class,'store']);
Route::put('/edit_article/{id}',[ArticleController::class,'update']);
Route::delete('/delete_article/{id}',[ArticleController::class,'destroy']);

