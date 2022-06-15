<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PagesController::class, 'homepage'])->name('homepage');

Route::post('/', [PagesController::class, 'contact'])->name('contact');

Route::get('/doctor_profile/{id}', [PagesController::class, 'doctor_profile'])->name('doctor_profile');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user');

Route::middleware('user')->group(function () {
    Route::view('about', 'about')->name('about')->middleware('auth');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Appointment
    Route::get('/appoinment', [UserController::class, 'user_appointment'])->name('user.appoinment.index');
    Route::get('/appoinment/new', [UserController::class, 'user_appointment_create'])->name('user.appoinment.create');
    Route::delete('/appoinment/{id}', [UserController::class, 'user_appointment_destroy'])->name('user.appoinment.destroy');

});

Route::prefix('doctor')->middleware('doctor')->group(function () {

    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');

    //my profile
    Route::get('/profile', [DoctorController::class, 'my_profile'])->name('doctor.profile');
    Route::post('/profile', [DoctorController::class, 'my_profile_update'])->name('doctor.profile.update');
    
    //User Profile
    Route::get('/auth_profile', [DoctorController::class, 'auth_profile'])->name('doctor.auth.profile');
    Route::put('/auth_profile', [DoctorController::class, 'auth_profile_update'])->name('doctor.auth.update');

    //Schedule
    Route::get('/schedule', [DoctorController::class, 'schedule_index'])->name('doctor.schedule.index');
    Route::view('/schedule/create', 'doctor.schedule.create');
    Route::post('/schedule', [DoctorController::class, 'schedule_store'])->name('doctor.schedule.store');
    Route::delete('/schedule/{id}', [DoctorController::class, 'schedule_destroy'])->name('doctor.schedule.destroy');

    //Appointment
    Route::get('/appointments', [DoctorController::class, 'appointment_index'])->name('doctor.appointment.index');
    Route::get('/appointments/{id}/edit', [DoctorController::class, 'appointment_edit'])->name('doctor.appointment.edit');
    Route::patch('/appointments/{id}', [DoctorController::class, 'appointment_update'])->name('doctor.appointment.update');
    Route::get('/appointments/{id}', [DoctorController::class, 'appointment_show'])->name('doctor.appointment.show');

});

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');

    //Role Management
    Route::get('/role', [AdminController::class, 'role_index'])->name('admin.role.index');
    Route::view('/role/create', 'admin.role.create')->name('admin.role.create');
    Route::post('/role', [AdminController::class, 'role_store'])->name('admin.role.store');
    Route::get('/role/{id}/edit', [AdminController::class, 'role_edit'])->name('admin.role.edit');
    Route::put('/role/{id}', [AdminController::class, 'role_update'])->name('admin.role.update');

    //User Management
    Route::get('/user/{role_id}', [AdminController::class, 'user_index'])->name('admin.user.index');
    Route::get('/user/create', [AdminController::class, 'user_create'])->name('admin.user.create');
    Route::post('/user', [AdminController::class, 'user_store'])->name('admin.user.store');
    Route::delete('user/{id}', [AdminController::class, 'user_destroy'])->name('admin.user.destroy');
    Route::get('user/{id}/edit', [AdminController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('user/{id}', [AdminController::class, 'user_update'])->name('admin.user.update');

    //Message
    Route::get('/messages', [AdminController::class, 'message_index'])->name('admin.message.index');
    Route::get('/messages/{id}', [AdminController::class, 'message_show'])->name('admin.message.show');
    Route::delete('/messages/{id}', [AdminController::class, 'message_destroy'])->name('admin.message.destroy');

    //Doctor Function
    Route::get('/speciality', [AdminController::class, 'speciality_index'])->name('admin.speciality.index');
    Route::view('/speciality/create', 'admin.special.create')->name('admin.speciality.create');
    Route::post('/speciality', [AdminController::class, 'speciality_store'])->name('admin.speciality.store');

    Route::get('/doctors', [AdminController::class, 'doctor_index'])->name('admin.doctor.index');
    Route::get('/doctors/{id}', [AdminController::class, 'doctor_show'])->name('admin.doctor.show');

    Route::get('/appointments', [AdminController::class, 'appointments_index'])->name('admin.appointment.index');
    Route::put('/appointments/{id}', [AdminController::class, 'appointments_update_status'])->name('admin.appointment.update');
    Route::get('/appointments/{id}', [AdminController::class, 'appointments_show'])->name('admin.appointment.show');

});

