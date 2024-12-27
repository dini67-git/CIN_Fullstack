<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\MembershipController;



/*
|-----------------------------------------------------------------------
|
| Here is where you can register web routes for yo--------------------------------
| Web Routes
|---------------------------------------------ur application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'gethome'])->name('home');
Route::get('/training', [TrainingController::class, 'gettraining'])->name('training');
Route::get('/blog', [BlogController::class, 'getblog'])->name('blog');
Route::get('/membership', [MembershipController::class, 'getmembership'])->name('membership');
Route::get('/about', [AboutController::class, 'getabout'])->name('about');
Route::get('/login', [AuthController::class, 'getlogin'])->name('login');
Route::get('/signin', [AuthController::class, 'getsignin'])->name('signin');
