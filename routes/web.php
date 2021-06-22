<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\CommandeController;
use App\Http\Controllers\admin\LigneCommandeController;
use App\Http\Controllers\client\ClientDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get( '/login' , [ LoginController::class , 'index' ]);
Route::post( '/login' , [ LoginController::class , 'LogIn' ]);

Route::resource('/', HomeController::class);

//Admin Routes
Route::get('/admin/dashboard',[AdminDashboardController::class ,'index']);

Route::resource('/admin/clients', ClientController::class);

Route::resource('/admin/articles', ArticleController::class);

Route::resource('admin/commandes', CommandeController::class);

Route::resource('admin/lignecommandes', LigneCommandeController::class);
Route::get('admin/lignecommandes/{commande_id}/{article_id}/edit', [LigneCommandeController::class,"edit"]);
Route::put('admin/lignecommandes/{commande_id}/{article_id}', [LigneCommandeController::class,"update"]);
Route::delete('admin/lignecommandes/{commande_id}/{article_id}', [LigneCommandeController::class,"destroy"]);


///////////Client Routes
Route::get('/client/dashboard',[ClientDashboardController::class ,'index']);
