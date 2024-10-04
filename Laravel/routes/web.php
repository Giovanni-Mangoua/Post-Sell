<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VueController;


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

/*
  Tous liees aux vendeurs
*/

//DashBord du vendeur
Route::get('/posts',[VueController::class,'posts'])->middleware('auth')->name('dash');
//Login vendeur
Route::get('/login',[VueController::class,'login'])->name('login');
Route::post('/connecting',[VueController::class,'connecting'])->name('connecting');
Route::get('/logout',[VueController::class,'doLogin'])->name('logout');
//Creer un compte pour le vendeur
Route::get('/account/vendor',[VueController::class,'createAccount'])->name('create.account');
Route::post('/create/account/vendor',[VueController::class,'creation'])->name('store.account');

//View pour Ajouter&Modifier un Post
Route::get('/add/post',[VueController::class,'view_add_post'])->name('view.add.post');
//Form pour ajouter un post
Route::post('/store/post/{id}',[VueController::class,'storing'])->name('store.post');
//Form pour modifier un post
Route::get('/modify/post/{id}',[VueController::class,'modify_1'])->name('modfify.post');
Route::post('/update/post/{id}',[VueController::class,'update_post'])->name('update.post');
//Delete post
Route::get('/delete/post/{id}',[VueController::class,'delete'])->name('delete.post');
//
Route::get('/show/post/{id}',[VueController::class,'showing'])->name('show.post');


/*
   Ours API
*/

Route::get('/nbs/vendeurs',[VueController::class,'comptVend']);
Route::get('/nbs/commandes',[VueController::class,'comptCommande']);
Route::get('/nbs/posts',[VueController::class,'comptPost']);
Route::get('/list/vendeurs',[VueController::class,'listingVendeur']);
Route::get('/list/vendsquator',[VueController::class,'listeVendFour']);
Route::get('/list/post/vendeurs/{id}',[VueController::class,'listingPostVend']);
Route::get('/list/commande/post/{id}',[VueController::class,'listingPostCommand']);