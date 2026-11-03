<?php

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
    return view('welcome');
});

Route::controller(NoteController::class)->middleware('auth')->group(function(){
    Route::get('/note', 'index')->name('note.index');
    Route::get('/note/create', 'create')->name('note.create');
    Route::post('/note', 'store')->name('note.store');
});


//test
Route::get('/login', function () {
    return 'Halaman Login Belum Dibuat';
})->name('login');

