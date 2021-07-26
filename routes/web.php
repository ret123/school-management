<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// User Routes

Route::prefix('users')->group(function () {
    Route::get('all', [UserController::class, 'index'])->name('users.all');
    Route::get('create', [UserController::class, 'create'])->name('users.add');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});

// Profile and password change

Route::prefix('profile')->group(function () {
    Route::get('show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});
