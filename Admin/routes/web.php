<?php

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


/*Admin
  Interface
*/


Route::get('/admin',[AdminController::class,'index'])->name('vue.admin')->middleware('auth');

Route::get('/login/admin',[AdminController::class,'connecting'])->name('login');
Route::post('/admin/login',[AdminController::class,'verify'])->name('admin.login');

Route::get('/logout/admin',[AdminController::class,'doLogout'])->name('logout');

Route::get('/article/vendeur/{id}',[AdminController::class,'listing'])->name('listing');
