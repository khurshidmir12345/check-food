<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\TaomlarController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('prices', PlanController::class);
    Route::get('/prices/show/{id}', [PlanController::class, 'show'])->name('admin.prices.show');

    Route::resource('permissions', PermissionController::class);
    Route::resource('taomlar', TaomlarController::class);
    Route::post('random-dish', [TaomlarController::class, 'getRandomDish'])->name('random-dish');

});
Route::group(['middleware' => ['web']], function () {
    Route::get('/api/auth/google/redirect', [SocialAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/api/auth/google/callback', [SocialAuthController::class, 'callback']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/', function () {
    return view('admin.meals.index');
})->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('auth');

Route::get('/home', function () {
    return view('layouts.header');
})->middleware('auth')->name('admin.layaouts.header');

Route::any('/handle/{paysys}', function ($paysys) {
    $result = (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();

    return response($result);
});


require __DIR__ . '/auth.php';
