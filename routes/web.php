<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\ServeController;
use App\Http\Controllers\RateController;


Route::get('/doctors', [AdminController::class, 'show_doctors'])->name('doctor.create');
Route::get('/serves', [ServeController::class, 'serves']);
Route::get('/articals', [ArticalController::class, 'show']);
Route::get('/rates', [RateController::class, 'rates']);
 Route::delete('/appointment_delete/{id}', [AdminController::class, 'destroy_a'])->name('apps.destroy');

Route::get('/', function () {
    return view('home'); 
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/user.php';

require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
