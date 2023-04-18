<?php

use App\Http\Controllers\BanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplyController;
use App\Models\Category;
use App\Models\User;
use Database\Seeders\SupplySeeder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        #
        'categorie_count' => Category::count(),
        'user_count' => User::count(),
        'user_online' => DB::table('sessions') ->whereNotNull('user_id') ->distinct() ->count('user_id'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'ban.redirect',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('demands', DemandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('supplies', SupplyController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::get('banned', BanController::class);
});
