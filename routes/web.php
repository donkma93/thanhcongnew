<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tin-tuc', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/tin-tuc/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories.index');
    Route::get('/articles', [AdminController::class, 'articles'])->name('articles.index');
    Route::get('/partners', [AdminController::class, 'partners'])->name('partners.index');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings.index');
    Route::get('/consultations', [AdminController::class, 'consultations'])->name('consultations.index');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::patch('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::patch('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');
    Route::post('/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::patch('/articles/{article}', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::delete('/articles/{article}', [AdminController::class, 'destroyArticle'])->name('articles.destroy');
    Route::post('/partners', [AdminController::class, 'storePartner'])->name('partners.store');
    Route::patch('/partners/{partner}', [AdminController::class, 'updatePartner'])->name('partners.update');
    Route::delete('/partners/{partner}', [AdminController::class, 'destroyPartner'])->name('partners.destroy');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::post('/homepage', [AdminController::class, 'updateHomepage'])->name('homepage.update');
});
