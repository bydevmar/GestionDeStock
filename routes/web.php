<?php

use App\Http\Controllers\AdminClients;
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
Route::resource('admin/commande', CommandeController::class);
Route::resource('admin/lignecommande', LigneCommandeController::class);

Route::get( '/login' , [ LoginController::class , 'index' ]);
Route::post( '/login' , [ LoginController::class , 'LogIn' ]);

Route::get('/admin/dashboard',[AdminDashboard::class ,'index']);

