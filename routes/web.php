<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CsvController;
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
})->name("home");



// for downloading the database record in csv format
Route::get('/export-users', [UserController::class, 'exportUsers'])->name('export.users');

// for showing csv record in browser 
Route::get('/display-csv', [CsvController::class,'displayCsv'])->name('display.csv');
