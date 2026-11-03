<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
    return view('auth.login');
});
//untuk yang sudah login
Route::controller(NoteController::class)->middleware('auth')->group(function(){
    Route::get('/note', 'index')->name('note.index');
    Route::get('/note/create', 'create')->name('note.create');
    Route::post('/note', 'store')->name('note.store');

    Route::get('/note/{note}/edit', 'edit');
    Route::put('/note/{note}', 'update');
    Route::delete('/note/{note}', 'destroy');
});

//untuk yang belum login
Route::controller(AuthController::class)->middleware('guest')->group(function(){
    Route::get('/auth/register', 'showRegister')->name('register');
    Route::post('/auth/register', 'register');

    Route::get('/auth/login', 'showLogin')->name('login');
    Route::post('/auth/login', 'login');
});

//untuk yang sudah login
Route::middleware('auth')->group(function(){
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
//test
// Route::get('/login', function () {
//     return 'Halaman Login Belum Dibuat';
// })->name('login');

