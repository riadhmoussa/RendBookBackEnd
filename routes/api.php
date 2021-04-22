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
use App\Http\Controllers\API\ConversationController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\CommandeController;

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
Route::put('/utilisateurs/picture/{id}',[UtilisateurController::class,'ChangePhoto']);
Route::put('/utilisateurs/info/{id}',[UtilisateurController::class,'AjourInfo']);
Route::get('verificationUtilisateur/{id}',[UtilisateurController::class,'VerifierUtilisateur']);


Route::post('/adresses/store',[AdresseController::class,'store']);
Route::get('/adresses/show/{id}',[AdresseController::class,'show']);
Route::put('/adresses/editeAdresse/{id}',[AdresseController::class,'editeAdresse']);


Route::post('/reclamation/store',[ReclamationController::class,'store']);
Route::get('/reclamation/show/{id}',[ReclamationController::class,'show']);



Route::post('/articles',[ArticleController::class,'store']);


Route::get('/categorie',[CategorieController::class,'getAllCategories']);
Route::get('/categories',[CategorieController::class,'getAllCategoriesSansPagination']);



Route::post('/produits',[ProduitController::class,'Ajouter']);
Route::get('/produits',[ProduitController::class,'AfficherProduits']);
Route::get('/produits/livres/{id}',[ProduitController::class,'AfficheMonLivres']);


Route::post('/produits/services',[ProduitController::class,'AjouterService']);
Route::get('/produits/services/{id}',[ProduitController::class,'AfficheMonService']);
Route::delete('/produits/services/{id}',[ProduitController::class,'SupprimerProduit']);

Route::get('/produits/{id}/{ville?}',[ProduitController::class,'getProductByCategorie']);
Route::post('/produits/RechercheThreFact',[ProduitController::class,'RechercheThreFact']);
Route::post('/produits/RechrcheTwoFact',[ProduitController::class,'RechrcheTwoFact']);
Route::post('/produits/RechercheOneFact',[ProduitController::class,'RechercheOneFact']);
Route::delete('/produits/{id}',[ProduitController::class,'SupprimerProduit']);

Route::get('/produitsId/{id}',[ProduitController::class,'AfficherLivreId']);
Route::get('/AfficherLivreDetails/{id}',[ProduitController::class,'AfficherLivreDetails']);


Route::post('/commentaires',[CommenterController::class,'AjouterCommenter']);
Route::get('/commentaires/{id}',[CommenterController::class,'AfficherCommentaire']);
Route::get('/commentairesUtilisateur/{id}',[CommenterController::class,'AfficherCommntairesUtilisateur']);


Route::post('/favoris',[FavoriController::class,'AjouterFavori']);
Route::get('/favoris/{user_id}/{product_id}',[FavoriController::class,'VerifierProduitPrefere']);
Route::delete('/favoris/{id}',[FavoriController::class,'AnnulerFavori']);
Route::get('/AfficherService/{id}',[FavoriController::class,'AfficherService']);
Route::get('/AfficherBook/{id}',[FavoriController::class,'AfficherBook']);
Route::delete('/RetraitFavorite/{user_id}/{product_id}',[FavoriController::class,'RetraitFavorite']);


Route::get('/conversation/{acheteur_id}/{proprietaire_id}/{product_id}',[ConversationController::class,'VerifierExsitConversation']);
Route::post('/conversation',[ConversationController::class,'creerConversation']);
Route::get('/conversations/{id}',[ConversationController::class,'AfficherMonListeConversation']);
Route::get("/AfficherConversation/{id}",[ConversationController::class,"AfficherConversation"]);



Route::post('/messages',[MessageController::class,'AjouterMessage']);
Route::get('/messages/{id}',[MessageController::class,'AfficherMessageConversation']);
Route::get('/messagesConversation/{id}',[MessageController::class,'ObtenirConversation']);
Route::get('/MiseAJourConversation/{id_conversation}/{last_id}',[MessageController::class,'MiseAJourConversation']);


Route::post('/commande',[CommandeController::class,'AjouterCommande']);
Route::post('/AjouterCommandeVente',[CommandeController::class,'AjouterCommandeVente']);
Route::post('/AjouterCommandeLocation',[CommandeController::class,'AjouterCommandeLocation']);
Route::get('/AfficherCommandesGet/{id}',[CommandeController::class,'AfficherCommandesGet']);
Route::get('/AfficherCommandePost/{id}',[CommandeController::class,'AfficherCommandePost']);