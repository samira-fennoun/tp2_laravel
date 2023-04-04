<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DocumentController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('article', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');
Route::get('article/{Article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('article-create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('article-create', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('article-edit/{Article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('article-edit/{Article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('article-edit/{Article}', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth');
Route::get('/forum', [ArticleController::class, 'forum'])->name('article.forum');
Route::get('article-pdf/{Article}', [ArticleController::class, 'pdf'])->name('article.pdf')->middleware('auth');

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('registration', [CustomAuthController::class, 'store']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword']);
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.password');
Route::post('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store')->middleware('auth');
Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->name('etudiants.show')->middleware('auth');
Route::get('/etudiants/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit')->middleware('auth');
Route::get('/etudiants/{id}/show', [EtudiantController::class, 'show'])->name('etudiants.show')->middleware('auth');
Route::put('/etudiants/{id}', [EtudiantController::class, 'update'])->name('etudiants.update')->middleware('auth');

Route::get('/documents', [DocumentController::class, 'forumDoc'])->name('documents.forumDoc');
Route::get('/mesDocuments', [DocumentController::class, 'index'])->name('documents.index')->middleware('auth');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create')->middleware('auth');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store')->middleware('auth');
Route::get('/documents/{id}', [DocumentController::class, 'show'])->name('documents.show')->middleware('auth');
Route::get('/documents/{id}/edit', [DocumentController::class, 'edit'])->name('documents.edit')->middleware('auth');
Route::put('/documents/{id}', [DocumentController::class, 'update'])->name('documents.update')->middleware('auth');
Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy')->middleware('auth');










//Route::get('article-page', [ArticleController::class, 'page'])->middleware('auth');

//Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');

//Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
//Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');

//Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');

// Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
// Route::get('/villes/create', [VilleController::class, 'create'])->name('villes.create');
// Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
// Route::get('/villes/{id}', [VilleController::class, 'show'])->name('villes.show');
// Route::get('/villes/{id}/edit', [VilleController::class, 'edit'])->name('villes.edit');
// Route::get('/villes/{id}/show', [VilleController::class, 'show'])->name('villes.show');
// Route::put('/villes/{id}', [VilleController::class, 'update'])->name('villes.update');
// Route::delete('/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');
