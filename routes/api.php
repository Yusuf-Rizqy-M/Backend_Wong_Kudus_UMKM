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
use App\Http\Controllers\API\KecamatanController;
use App\Http\Controllers\API\UmkmOpeningHourController;
use App\Http\Controllers\API\UmkmListingController;
// BARU: Import controller yang ditambahkan
use App\Http\Controllers\API\UmkmMenuController;
use App\Http\Controllers\API\UmkmLocationController;
use App\Http\Controllers\API\UmkmContactController;


// === PUBLIC ROUTES ===
Route::post('/login', [UserController::class, 'login']);

// --- KATEGORI ---
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

// --- UMKM ---
Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/umkm/{id}', [UmkmController::class, 'show']);

// --- GALERI UMKM ---
Route::get('/galeri-umkm', [GaleriUmkmController::class, 'index']);
Route::get('/galeri-umkm/{id}', [GaleriUmkmController::class, 'show']);
Route::get('/galeri-umkm/umkm/{umkm_id}', [GaleriUmkmController::class, 'getByUmkmId']);

// BARU: Route untuk Menu UMKM ---
Route::get('/umkm-menu', [UmkmMenuController::class, 'index']);
Route::get('/umkm-menu/{umkmMenu}', [UmkmMenuController::class, 'show']); // Menggunakan {umkmMenu} untuk Route Model Binding
Route::get('/umkm-menu/umkm/{umkm_id}', [UmkmMenuController::class, 'getByUmkm']); // <-- BARIS INI DITAMBAHKAN

// BARU: Route untuk Lokasi UMKM ---
Route::get('/umkm-locations', [UmkmLocationController::class, 'index']); // Get semua lokasi
Route::get('/umkm/{umkm}/location', [UmkmLocationController::class, 'show']); // Get lokasi spesifik by UMKM

// BARU: Route untuk Kontak UMKM ---
Route::get('/umkm-contact', [UmkmContactController::class, 'index']); // Get semua kontak
Route::get('/umkm/{umkm}/contact', [UmkmContactController::class, 'show']); // Get kontak spesifik by UMKM

// --- JAM OPERASIONAL UMKM (BARU) ---
Route::get('/umkm-hours', [UmkmOpeningHourController::class, 'index']);
Route::get('/umkm-hours/{id}', [UmkmOpeningHourController::class, 'show']);
Route::get('/umkm-hours/umkm/{umkm_id}', [UmkmOpeningHourController::class, 'getByUmkmId']);

// --- LISTING UMKM (BARU) ---
Route::get('/umkm-listings', [UmkmListingController::class, 'index']);
Route::get('/umkm-listings/{id}', [UmkmListingController::class, 'show']);


// --- ARTIKEL & BLOG ---
Route::get('/categories-blog', [CategoryBlogController::class, 'getCategories']);
Route::get('/categories-blog/{id}', [CategoryBlogController::class, 'getCategory']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/articles/category/{id}', [ArticleController::class, 'getArticlesByCategory']);

// --- KONTAK, RATING, KECAMATAN ---
Route::post('/contact/send', [ContactUmkmController::class, 'send']);
Route::get('/rating', [RatingWebsiteController::class, 'index']);
Route::get('/rating/{id}', [RatingWebsiteController::class, 'show']);
Route::post('/rating', [RatingWebsiteController::class, 'store']);
Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kecamatan/{id}', [KecamatanController::class, 'show']);


// === PROTECTED ROUTES (auth:sanctum) ===
Route::middleware('auth:sanctum')->group(function () {

    // --- USER ---
    Route::get('/user', [UserController::class, 'info']);
    Route::post('/user/update', [UserController::class, 'updateProfile']);
    Route::post('/logout', [UserController::class, 'logout']);

    // --- CATEGORY ---
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // --- UMKM ---
    Route::post('/umkm', [UmkmController::class, 'store']);
    Route::put('/umkm/{id}', [UmkmController::class, 'update']);
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy']);

    // --- CATEGORY BLOG ---
    Route::post('/categories-blog', [CategoryBlogController::class, 'createCategory']);
    Route::put('/categories-blog/{id}', [CategoryBlogController::class, 'updateCategory']);
    Route::delete('/categories-blog/{id}', [CategoryBlogController::class, 'deleteCategory']);

    // --- ARTICLE ---
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
    Route::get('/articles/{id}/detail', [ArticleController::class, 'showDetail']);

    // --- CONTACT ---
    Route::get('/contact', [ContactUmkmController::class, 'index']);
    Route::get('/contact/{id}', [ContactUmkmController::class, 'show']);
    Route::put('/contact/read/{id}', [ContactUmkmController::class, 'markAsRead']);
    Route::delete('/contact/{id}', [ContactUmkmController::class, 'destroy']);

    // --- RATING ---
    Route::get('/rating/average/value', [RatingWebsiteController::class, 'average']);
    Route::delete('/rating/{id}', [RatingWebsiteController::class, 'destroy']);

    // --- GALERI UMKM ---
    Route::post('/galeri-umkm', [GaleriUmkmController::class, 'store']);
    Route::put('/galeri-umkm/{id}', [GaleriUmkmController::class, 'update']);
    Route::delete('/galeri-umkm/{id}', [GaleriUmkmController::class, 'destroy']);
    

    // === BARU DITAMBAHKAN ===

    // --- JAM OPERASIONAL ---
    Route::post('/umkm-hours', [UmkmOpeningHourController::class, 'store']);
    Route::put('/umkm-hours/{id}', [UmkmOpeningHourController::class, 'update']);
    Route::delete('/umkm-hours/{id}', [UmkmOpeningHourController::class, 'destroy']);

    // --- LISTING ---
    Route::post('/umkm-listings', [UmkmListingController::class, 'store']);
    Route::put('/umkm-listings/{id}', [UmkmListingController::class, 'update']);
    Route::delete('/umkm-listings/{id}', [UmkmListingController::class, 'destroy']);
    
    // BARU: Route untuk Menu UMKM ---
    Route::post('/umkm-menu', [UmkmMenuController::class, 'store']);
    // Catatan: Jika update mengirim file, gunakan POST bukan PUT, atau pastikan client Anda mendukung PUT dengan multipart/form-data
    Route::put('/umkm-menu/{umkmMenu}', [UmkmMenuController::class, 'update']); // Menggunakan {umkmMenu} untuk Route Model Binding
    Route::delete('/umkm-menu/{umkmMenu}', [UmkmMenuController::class, 'destroy']); // Menggunakan {umkmMenu}

    // BARU: Route untuk Lokasi UMKM ---
    Route::post('/umkm-locations', [UmkmLocationController::class, 'store']); 
    Route::put('/umkm/{umkm}/location', [UmkmLocationController::class, 'update']); // Update/create lokasi by UMKM
    Route::delete('/umkm-locations/{umkmLocation}', [UmkmLocationController::class, 'destroy']); // Hapus by ID lokasi
    Route::put('/umkm-locations/{id}/activate', [UmkmLocationController::class, 'activate']); // <-- BARIS INI DITAMBAHKAN

    // BARU: Route untuk Kontak UMKM ---
    Route::post('/umkm-contact', [UmkmContactController::class, 'store']);
    Route::put('/umkm/{umkm}/contact', [UmkmContactController::class, 'update']); // Update/create kontak by UMKM
    Route::delete('/umkm-contact/{umkmContact}', [UmkmContactController::class, 'destroy']); // Hapus by ID kontak
    Route::put('/umkm-contact/{id}/activate', [UmkmContactController::class, 'activate']); // <-- BARIS INI DITAMBAHKAN
});