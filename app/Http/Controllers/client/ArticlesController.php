<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $articles = Article::all();
        return view('pages.client.articles.index', ['articles' => $articles]);
    }

    
}
