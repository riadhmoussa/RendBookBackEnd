<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\UtilisateurController;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\AdresseController;
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

Route::get('/hello',[AuthController::class,'HelloWorld']);


Route::post('/utilisateurs/store',[UtilisateurController::class,'store']);
Route::post('/utilisateurs/show/{id}',[UtilisateurController::class,'show']);


Route::post('adresses',[AdresseController::class,'store']);

Route::post('/articles',[ArticleController::class,'store']);


