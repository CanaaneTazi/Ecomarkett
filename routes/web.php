<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\test;
use App\Http\Middleware\CheckUserType;

Route::get('/', HomeController::class)->name('dashboard');
Route::get('/article/{id}', [ArticlesController::class, 'show']);
Route::get('/categorie', CategorieController::class);
Route::get('/categorie/{id}', [CategorieController::class, 'show']);

Route::post('/paiement',[PaiementController::class, 'paiement']);
Route::get('/paiement/success', [PaiementController::class, 'success'])->name('paiement.success');
Route::get('/paiement/cancel', [PaiementController::class, 'cancel'])->name('paiement.cancel');

Route::post('/article/search', [test::class, 'search'])->name('articles.search');

Route::post('/categorie/store', [CategorieController::class, 'store']);


Route::resource('articles', ArticlesController::class)->middleware(['auth', 'verified', CheckUserType::class]);

Route::resource('categories', CategorieController::class)->middleware(['auth', 'verified',CheckUserType::class]);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
