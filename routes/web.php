<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [CustomerController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/create-customer', [CustomerController::class, 'create'])->middleware('auth')->name('customer.create');
Route::post('/create-customer', [CustomerController::class, 'store'])->middleware('auth')->name('customer.store');
Route::get('/edit-customer/{customer}', [CustomerController::class, 'edit'])->middleware('auth')->name('customer.edit');
Route::put('/edit-customer', [CustomerController::class, 'update'])->middleware('auth')->name('customer.update');
Route::delete('/delete-customer/{customer}', [CustomerController::class, 'destroy'])->middleware('auth')->name('customer.delete');

Route::get('/book', [BookController::class, 'index'])->middleware('auth')->name('book.index');
Route::get('/create-book', [BookController::class, 'create'])->middleware('auth')->name('book.create');
Route::post('/create-book', [BookController::class, 'store'])->middleware('auth')->name('book.store');
Route::get('/edit-book/{book}', [BookController::class, 'edit'])->middleware('auth')->name('book.edit');
Route::put('/edit-book', [BookController::class, 'update'])->middleware('auth')->name('book.update');
Route::delete('/delete-book/{book}', [BookController::class, 'destroy'])->middleware('auth')->name('book.delete');
Route::get('/book-has-many', [BookController::class, 'hasMany'])->middleware('auth')->name('book.has.many');
Route::get('/book-has-one', [BookController::class, 'hasOne'])->middleware('auth')->name('book.has.one');
Route::get('/insert-related-models', [BookController::class, 'insertRelatedModels'])->middleware('auth')->name('insert.related.models');

require __DIR__.'/auth.php';
