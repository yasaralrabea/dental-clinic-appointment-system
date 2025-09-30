<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServeController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\questionController;

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admin_dashboard', function () {return view('admin_home');})->name('admin.dashboard');

    Route::get('/appointments_controll', [AdminController::class, 'index'])->name('appointments.index');
    Route::post('add_appointments', [AdminController::class, 'store'])->name('appointments.store');
    Route::delete('delete/appointments/{id}', [AdminController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/patient_appointments', [AdminController::class, 'patient_appointments'])->name('appointments.index');
    Route::delete('/appointment_delete/{id}', [AdminController::class, 'destroy_a'])->name('apps.destroy');
    Route::delete('/appointment_done/{id}', [AdminController::class, 'done'])->name('apps.done');
   // Route::get('/admin/dashboard', [AdminController::class, 'get_admin_name'])->name('admin.dashboard');
    Route::post('add_doctor', [AdminController::class, 'add_doctor'])->name('doctor.store');
    Route::get('/doctors_index', [AdminController::class, 'add_doctors']);
    Route::post('doctor_delete', [AdminController::class, 'destroy_d'])->name('doctor.destroy');
    Route::get('/serves_controll', [ServeController::class, 'serves_controll']);
    Route::get('destroy', [ServeController::class, 'serves_controll'])->name('serves.destroy');
    Route::post('add_serve', [ServeController::class, 'store'])->name('serves.store');
    Route::delete('/serves/{id}', [serveController::class, 'destroy'])->name('serves.destroy');
    Route::get('/add_artical_view', [ArticalController::class, 'add_artical']);
    Route::post('add_artical', [ArticalController::class, 'store'])->name('artical.store');
    Route::delete('/artical_d/{id}', [ArticalController::class, 'destroy'])->name('artical.destroy');
    Route::post('add_artical', [ArticalController::class, 'store'])->name('artical.store');
    Route::get('/show_Q', [questionController::class, 'show']);
    Route::post('answer/store', [questionController::class, 'store_A'])->name('answer.store');
    Route::get('/users_admin', [AdminController::class, 'users'])->name('users.index');
    Route::post('/users/{id}/promote', [UserController::class, 'promote'])->name('users.promote');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/admin/delete', [AdminController::class, 'admin_delete'])->name('admin.delete');
   Route::get('/all_appointments', [AdminController::class, 'all'])->name('all.appointments');
});
