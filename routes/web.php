<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin
Route::get('admin', function(){
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin']);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::put('/admin/assign-role/{user}', [AdminController::class, 'assignRole'])->name('admin.assignRole');



Route::get('mahasiswa', function(){
    return view('mahasiswa.dashboard');
})->middleware(['auth', 'verified', 'role:mahasiswa']);

Route::get('koordinator', function(){
    return view('koordinator.dashboard');
})->middleware(['auth', 'verified', 'role:koordinator']);

Route::get('dosenPenguji', function(){
    return view('dosenPenguji.dashboard');
})->middleware(['auth', 'verified', 'role:dosenPenguji']);

Route::get('dosenPembimbing', function(){
    return view('dosenPembimbing.dashboard');
})->middleware(['auth', 'verified', 'role:dosenPembimbing']);

Route::get('BAAK', function(){
    return view('baak.dashboard');
})->middleware(['auth', 'verified', 'role:BAAK']);


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

require __DIR__.'/auth.php';
