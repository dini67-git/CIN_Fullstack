<?php

use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\InscriptionController;

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
Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/membership', [MembershipController::class, 'getmembership'])->name('membership');
Route::get('/about', [AboutController::class, 'getabout'])->name('about');
//Route::get('/login', [AuthController::class, 'getlogin'])->name('login');
Route::get('/signin', [AuthController::class, 'getsignin'])->name('signin');
Route::get('/dashboard', [DashboardController::class, 'getdashboard'])->name('dashboard')->middleware('admin');

//Route::get('/trainings', [TrainingsController::class, 'gettrainings'])->name('dash.trainings');
//Route::get('/blogs', [BlogController::class, 'getblogs'])->name('dash.blogs');


//Route::post('/signin', [AuthController::class, 'register'])->name('signin.post');
//Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Routes pour la gestion des utilisateurs et l'authentification
Route::resource('users', UserController::class);
// Routes spécifiques pour la connexion et la déconnexion
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('posts', PostController::class);
Route::resource('formations', FormationController::class);
Route::resource('inscription', InscriptionController::class);
Route::resource('formations.inscription', InscriptionController::class);


Route::get('/users/{user}/approuver', [UserController::class, 'approuver'])->name('users.approuver');
