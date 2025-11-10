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
use App\Http\Controllers\API\GaleriUmkmController;
use App\Http\Controllers\API\MenuUmkmController;
use App\Http\Controllers\API\KecamatanController;

// === PUBLIC ROUTES ===
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

Route::get('/galeri-umkm', [GaleriUmkmController::class, 'index']);
Route::get('/galeri-umkm/{id}', [GaleriUmkmController::class, 'show']);

Route::get('/menu-umkm', [MenuUmkmController::class, 'index']);
Route::get('/menu-umkm/{id}', [MenuUmkmController::class, 'show']);
Route::get('/menu-umkm/umkm/{umkm_id}', [MenuUmkmController::class, 'getByUmkmId']);

Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kecamatan/{id}', [KecamatanController::class, 'show']);

// === PROTECTED ROUTES (auth:sanctum) ===
Route::middleware('auth:sanctum')->group(function () {

    // === USER ===
    Route::get('/user', [UserController::class, 'info']);           // FIXED: Hanya 1
    Route::post('/user/update', [UserController::class, 'updateProfile']);
    Route::post('/logout', [UserController::class, 'logout']);      // FIXED: Pakai controller

    // === CATEGORY ===
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // === UMKM ===
    Route::post('/umkm', [UmkmController::class, 'store']);
    Route::put('/umkm/{id}', [UmkmController::class, 'update']);
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy']);

    // === CATEGORY BLOG ===
    Route::post('/categories-blog', [CategoryBlogController::class, 'createCategory']);
    Route::put('/categories-blog/{id}', [CategoryBlogController::class, 'updateCategory']);
    Route::delete('/categories-blog/{id}', [CategoryBlogController::class, 'deleteCategory']);

    // === ARTICLE ===
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
    Route::get('/articles/{id}/detail', [ArticleController::class, 'showDetail']);

    // === CONTACT ===
    Route::get('/contact', [ContactUmkmController::class, 'index']);
    Route::get('/contact/{id}', [ContactUmkmController::class, 'show']);
    Route::put('/contact/read/{id}', [ContactUmkmController::class, 'markAsRead']);
    Route::delete('/contact/{id}', [ContactUmkmController::class, 'destroy']);

    // === RATING ===
    Route::get('/rating/average/value', [RatingWebsiteController::class, 'average']);
    Route::delete('/rating/{id}', [RatingWebsiteController::class, 'destroy']);

    // === GALERI UMKM ===
    Route::post('/galeri-umkm', [GaleriUmkmController::class, 'store']);
    Route::put('/galeri-umkm/{id}', [GaleriUmkmController::class, 'update']);
    Route::delete('/galeri-umkm/{id}', [GaleriUmkmController::class, 'destroy']);
    Route::get('/galeri-umkm/umkm/{umkm_id}', [GaleriUmkmController::class, 'getByUmkmId']);

    // === MENU UMKM ===
    Route::post('/menu-umkm', [MenuUmkmController::class, 'store']);
    Route::put('/menu-umkm/{id}', [MenuUmkmController::class, 'update']);
    Route::delete('/menu-umkm/{id}', [MenuUmkmController::class, 'destroy']);
});