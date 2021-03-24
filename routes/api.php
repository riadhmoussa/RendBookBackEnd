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
use App\Http\Controllers\API\ProduitController;
use App\Http\Controllers\API\CommenterController;
use App\Http\Controllers\API\FavoriController;

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



Route::post('/utilisateurs/store',[UtilisateurController::class,'creerUtilisateur']);
Route::post('/utilisateurs/show/{id}',[UtilisateurController::class,'Afficher']);
Route::get('/utilisateurs/getuser/{id}',[UtilisateurController::class,'obtenirUtilisateur']);
Route::put('/utilisateurs/{id}',[UtilisateurController::class,'ChangePhoto']);


Route::post('/adresses/store',[AdresseController::class,'store']);
Route::get('/adresses/show/{id}',[AdresseController::class,'show']);
Route::put('/adresses/editeAdresse/{id}',[AdresseController::class,'editeAdresse']);


Route::post('/reclamation/store',[ReclamationController::class,'store']);
Route::get('/reclamation/show/{id}',[ReclamationController::class,'show']);



Route::post('/articles',[ArticleController::class,'store']);


Route::get('/categorie',[CategorieController::class,'getAllCategories']);



Route::post('/produits',[ProduitController::class,'Ajouter']);
Route::get('/produits',[ProduitController::class,'AfficherProduits']);
Route::get('/produits/livres/{id}',[ProduitController::class,'AfficheMonLivres']);


Route::post('/produits/services',[ProduitController::class,'AjouterService']);
Route::get('/produits/services/{id}',[ProduitController::class,'AfficheMonService']);
Route::delete('/produits/services/{id}',[ProduitController::class,'SupprimerProduit']);

Route::get('/produits/{id}/{ville?}',[ProduitController::class,'getProductByCategorie']);

Route::delete('/produits/{id}',[ProduitController::class,'SupprimerProduit']);

Route::get('/produitsId/{id}',[ProduitController::class,'AfficherLivreId']);


Route::post('/commentaires',[CommenterController::class,'AjouterCommenter']);
Route::get('/commentaires/{id}',[CommenterController::class,'AfficherCommentaire']);
Route::get('/commentairesUtilisateur/{id}',[CommenterController::class,'AfficherCommntairesUtilisateur']);


Route::post('/favoris',[FavoriController::class,'AjouterFavori']);
Route::get('/favoris/{user_id}/{product_id}',[FavoriController::class,'VerifierProduitPrefere']);
Route::delete('/favoris/{id}',[FavoriController::class,'AnnulerFavori']);


