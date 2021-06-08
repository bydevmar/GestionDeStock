<?php
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/clients', ClientController::class);

Route::resource('/admin/articles', ArticleController::class);

Route::resource('admin/commandes', CommandeController::class);

Route::resource('admin/lignecommandes', LigneCommandeController::class);
Route::get('admin/lignecommandes/{commande_id}/{article_id}/edit', [LigneCommandeController::class,"edit"]);

Route::get( '/login' , [ LoginController::class , 'index' ]);
Route::post( '/login' , [ LoginController::class , 'LogIn' ]);

Route::get('/admin/dashboard',[AdminDashboard::class ,'index']);