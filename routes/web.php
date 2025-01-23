<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'gethome'])->name('home');
Route::get('/training', [TrainingController::class, 'gettraining'])->name('training');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/membership', [MembershipController::class, 'getmembership'])->name('membership');
Route::get('/about', [AboutController::class, 'getabout'])->name('about');
Route::get('/login', [AuthController::class, 'getlogin'])->name('login');
Route::get('/signin', [AuthController::class, 'getsignin'])->name('signin');
Route::get('/dashboard', [DashboardController::class, 'getdashboard'])->name('dashboard');

Route::get('/users', [UsersController::class, 'getusers'])->name('dash.users');
Route::get('/trainings', [TrainingsController::class, 'gettrainings'])->name('dash.trainings');
Route::get('/blogs', [BlogController::class, 'getblogs'])->name('dash.blogs');


Route::post('/signin', [AuthController::class, 'register'])->name('signin.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::resource('posts', PostController::class);
