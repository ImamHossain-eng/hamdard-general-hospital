<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
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
    return view('pages.homepage');
})->name('homepage');
Route::post('/', [PagesController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('user')->group(function () {
    Route::view('about', 'about')->name('about')->middleware('auth');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Route::get('/admin', function(){
//     return 'admin';
// })->name('admin');

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');

    //ROle Management
    Route::get('/role', [AdminController::class, 'role_index'])->name('admin.role.index');
    Route::view('/role/create', 'admin.role.create')->name('admin.role.create');
    Route::post('/role', [AdminController::class, 'role_store'])->name('admin.role.store');
    Route::get('/role/{id}/edit', [AdminController::class, 'role_edit'])->name('admin.role.edit');
    Route::put('/role/{id}', [AdminController::class, 'role_update'])->name('admin.role.update');

    //User Management
    Route::get('/user', [AdminController::class, 'user_index'])->name('admin.user.index');
    Route::get('/user/create', [AdminController::class, 'user_create'])->name('admin.user.create');
    Route::post('/user', [AdminController::class, 'user_store'])->name('admin.user.store');
    Route::delete('user/{id}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');
    Route::get('user/{id}/edit', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('user/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');
});
