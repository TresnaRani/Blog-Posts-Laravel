<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/post-list');
    })->name('dashboard');
    //post routes
    Route::get('/post-list', [PostController::class, 'index'])->name('/post-list');
    Route::get('/post-details/{id}', [PostController::class, 'show'])->name('/post-details');
    Route::get('/add-post', [PostController::class, 'create'])->name('/add-post');
    Route::post('/store-post', [PostController::class, 'store'])->name('/store-post');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('/edit-post');
    Route::post('/update-post/{id}', [PostController::class, 'update'])->name('/update-post');
    Route::get('/delete-post/{id}', [PostController::class, 'destroy'])->name('/delete-post');
    Route::get('/search-post', [PostController::class, 'search'])->name('/search-post');
});
