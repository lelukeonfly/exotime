<?php

use App\Http\Controllers\BanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MyPostsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostRequestController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
# feedbacks made by user
#Feedback::where('user_id', $user->id)->count()
# feedbacks to my account
#$user->feedbacks->count()
# all feedbacks on user posts
#$totalFeedbacks = Feedback::whereHasMorph('feedbackable', [Post::class], function ($query) use ($user) {$query->where('user_id', $user->id);})->count();

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'ban.redirect',
])->group(function () {

    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('demands', DemandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('supplies', SupplyController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::get('myposts', MyPostsController::class)->name('myposts');
    Route::get('banned', BanController::class);
    Route::get('requests', RequestController::class)->name('requests');
    Route::get('profile/{user}', UserController::class)->name('profile');

    Route::prefix('posts')->group(function(){
        Route::post('/{post}/request/create', [PostRequestController::class, 'storeRequest'])->name('storeRequest');
        Route::put('/{post}/request/{user}/accept', [PostRequestController::class, 'acceptRequest'])->name('acceptRequest');
        Route::put('/{post}/request/{user}/reject', [PostRequestController::class, 'rejectRequest'])->name('rejectRequest');
    });
});

Route::post('fastregister', function(){
    $user = User::factory()->withPosts()->create();
    Auth::login($user);
    return redirect()->route('dashboard');
})->name('fastregister');
