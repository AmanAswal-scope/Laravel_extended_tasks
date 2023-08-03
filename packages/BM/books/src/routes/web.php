<?php

use App\Http\Controllers\ExtendedCustomController;



use BM\Books\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use \BM\Books\Http\Controllers\AuthController;
use \BM\Books\Http\Controllers\BooksController;
use BM\Books\Http\Controllers\CategoryController;
use \BM\Books\Http\Middleware\user_check;
use \BM\Books\Http\Middleware\admin_check;




Route::middleware(['web'])->group( function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
    Route::post('/registration', [AuthController::class, 'registration'])->name("registration");
    
    
    Route::group(['middleware' => [user_check::class]], function () {

        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
        //Books
        Route::get('/books', [BooksController::class, 'books'])->name('books');

        //Category
        Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
    
    });
    
    //Api
    Route::get('/api/categories-by-ajax', [CategoryController::class, 'ajaxCategoryFilter'])->name('categories.by.ajax');
});



//Admin routes
Route::middleware(['web'])->name('admin.')->prefix('admin')->group( function () {
    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('login-post');
    
    
    Route::group(['middleware' => [admin_check::class]], function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    






        
        //Books
        Route::get('/books', [BooksController::class, 'books'])->name('books');
        Route::get('/books/create', [BooksController::class, 'createPage'])->name('books.create');
      //  Route::post('/books/store', [BooksController::class, 'store'])->name('books.store');
        Route::post('/books/store', [ExtendedCustomController::class, 'store'])->name('books.store');

        // Route::get('/books/edit/{id}', [BooksController::class, 'editPage'])->name('books.edit');
        // Route::post('/books/update', [BooksController::class, 'update'])->name('books.update');
        Route::get('/books/edit/{id}', [ExtendedCustomController::class, 'editPage'])->name('books.edit');
        Route::post('/books/update', [ExtendedCustomController::class, 'update'])->name('books.update');

       // Route::get('/books/delete/{id}', [BooksController::class, 'delete'])->name('books.delete');
        Route::get('/books/delete/{id}', [ExtendedCustomController::class, 'delete'])->name('books.delete');









        //Category
        Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
        Route::get('/categories/create', [CategoryController::class, 'createPage'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'editPage'])->name('categories.edit');
        Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    
    });
    
});
