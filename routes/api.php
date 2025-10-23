<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\UmkmController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ContactUmkmController;
use App\Http\Controllers\API\CategoryBlogController;
use App\Http\Controllers\API\RatingWebsiteController;

Route::post('/login', [UserController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/umkm/{id}', [UmkmController::class, 'show']);
Route::get('/categories-blog', [CategoryBlogController::class, 'getCategories']);
Route::get('/categories-blog/{id}', [CategoryBlogController::class, 'getCategory']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/articles/category/{id}', [ArticleController::class, 'getArticlesByCategory']);
Route::post('/contact/send', [ContactUmkmController::class, 'send']);

Route::get('/rating', [RatingWebsiteController::class, 'index']);
Route::get('/rating/{id}', [RatingWebsiteController::class, 'show']);
Route::post('/rating', [RatingWebsiteController::class, 'store']);
Route::get('/umkm/kecamatan/{kecamatan}', [UmkmController::class, 'countByKecamatan']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil'
        ], 200);
    });

    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    Route::post('/umkm', [UmkmController::class, 'store']);
    Route::put('/umkm/{id}', [UmkmController::class, 'update']);
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy']);

    Route::post('/categories-blog', [CategoryBlogController::class, 'createCategory']);
    Route::put('/categories-blog/{id}', [CategoryBlogController::class, 'updateCategory']);
    Route::delete('/categories-blog/{id}', [CategoryBlogController::class, 'deleteCategory']);

    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);

    Route::get('/contact', [ContactUmkmController::class, 'index']);
    Route::get('/contact/{id}', [ContactUmkmController::class, 'show']);
    Route::put('/contact/read/{id}', [ContactUmkmController::class, 'markAsRead']);
    Route::delete('/contact/{id}', [ContactUmkmController::class, 'destroy']);

    Route::get('/rating/average/value', [RatingWebsiteController::class, 'average']);
    Route::delete('/rating/{id}', [RatingWebsiteController::class, 'destroy']);
});
