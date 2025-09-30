<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\PayController;

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile_user', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/profile_user_update', [UserController::class, 'update'])->name('user.update');

    Route::get('/new_appointment', [AppointmentController::class, 'create'])->name('new.store');
    Route::post('/new_appointment', [AppointmentController::class, 'store']);
    Route::get('/get-times-for-date', [AppointmentController::class, 'avillable_time'])->name('getTimesForDate');
    Route::get('/my_appointments', [AppointmentController::class, 'my_apps']);
    Route::post('destroy', [AppointmentController::class, 'destroy'])->name('apps.destroy');

    Route::get('/send', [questionController::class, 'send']);
    Route::get('/my_q', [questionController::class, 'my_q']);
    Route::post('send_Q', [questionController::class, 'store'])->name('send.store');

    Route::post('add_rate', [RateController::class, 'store'])->name('rates.store');

    Route::post('/payment', [PayController::class, 'payment'])->name('payment');
});
