<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksActionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PublishingController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\TypeOfBookController;
use App\Models\Books_Action;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items/books', [BookController::class, 'index'])->name('items.books.index');
Route::get('/items/books/create', [BookController::class, 'create'])->name('items.books.create');
Route::post('/items/books/', [BookController::class, 'store'])->name('items.books.store');

Route::get('/items/authors', [AuthorController::class, 'index'])->name('items.authors.index');
Route::get('/items/authors/create', [AuthorController::class, 'create'])->name('items.authors.create');
Route::post('/items/authors/create', [AuthorController::class, 'store'])->name('items.authors.store');

Route::get('/items/types-of-books', [TypeOfBookController::class, 'index'])->name('items.types-of-books.index');
Route::get('/items/types-of-books/create', [TypeOfBookController::class, 'create'])->name('items.types-of-books.create');
Route::post('/items/types-of-books/create', [TypeOfBookController::class, 'store'])->name('items.types-of-books.store');

Route::get('/items/publishings', [PublishingController::class, 'index'])->name('items.publishings.index');
Route::get('/items/publishings/create', [PublishingController::class, 'create'])->name('items.publishings.create');
Route::post('/items/publishings/create', [PublishingController::class, 'store'])->name('items.publishings.store');

Route::get('/readers/groups', [GroupController::class, 'index'])->name('readers.groups.index');
Route::get('/readers/groups/create', [GroupController::class, 'create'])->name('readers.groups.create');
Route::post('/readers/groups/create', [GroupController::class, 'store'])->name('readers.groups.store');

Route::get('/readers/readers/', [ReaderController::class, 'index'])->name('readers.readers.index');
Route::get('/readers/readers/create', [ReaderController::class, 'create'])->name('readers.readers.create');
Route::post('/readers/readers/create', [ReaderController::class, 'store'])->name('readers.readers.store');

Route::get('/accounting/', [BooksActionController::class, 'index'])->name('accounting.index');
Route::get('/accounting/issuance/', [BooksActionController::class, 'issuance'])->name('accounting.issuance');
Route::post('/accounting/', [BooksActionController::class, 'get_book'])->name('accounting.get_book');
