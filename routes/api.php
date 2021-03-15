<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\UtilisateurController;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\AdresseController;
use App\Http\Controllers\API\ReclamationController;
use App\Http\Controllers\API\CategorieController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);



Route::post('/utilisateurs/store',[UtilisateurController::class,'createUtilisateur']);
Route::post('/utilisateurs/show/{id}',[UtilisateurController::class,'show']);
Route::get('/utilisateurs/getuser/{id}',[UtilisateurController::class,'getuser']);


Route::post('/adresses/store',[AdresseController::class,'store']);
Route::get('/adresses/show/{id}',[AdresseController::class,'show']);


Route::post('/reclamation/store',[ReclamationController::class,'store']);
Route::get('/reclamation/show/{id}',[ReclamationController::class,'show']);



Route::post('/articles',[ArticleController::class,'store']);


Route::get('/categorie',[CategorieController::class,'getAllCategories']);


