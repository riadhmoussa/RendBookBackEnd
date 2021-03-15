<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Log;

class CategorieController extends Controller
{
    public function getAllCategories() {
        $categories = Categorie::get();
        return response($categories, 200);
      }
}
