<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\NotificationController;

class ArticleController extends Controller
{
  
    public function index()
    {
        return response([ 'salut' => 'hello world!!!!!']);
    }

    public function store(Request $request)
    {
       
        return response([ 'salut' => 'hello world!!!!!!!']);
    }

    public function show(Article $article)
    {
        return response([ 'salut' => 'hello world!']);
    }

 
    public function update(Request $request, Article $article)
    {
        return response([ 'salut' => 'hello world!']);
    }

   
    public function destroy(Article $article)
    {
        return response([ 'salut' => 'hello world!']);
    }
}
