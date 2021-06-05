<?php

namespace App\Http\Controllers;

use App\Http\Requests\articleRequest;
use App\Models\Article;
use App\Models\Categorie;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\ImageManagerStatic as Image;


use File;

class ArticleController extends Controller
{
    public function __construct()
    {
        //il faut se connecter pour acceder a cette controller
        //$this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        return view('pages.article.index', ['articles' => $articles]);
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('pages.article.create', ['categories' => $categories]);
    }

    public function store(articleRequest $r)
    {
        $article = new Article();
        $article->nomarticle = $r->input('nomarticle');
        $article->descriptionarticle = $r->input('descriptionarticle');
        $article->prixarticle = $r->input('prixarticle');
        $article->categorie_id = $r->categories;
        if ($r->hasFile('imagearticle')) {
            $pub = public_path("storage\photos\\");
            $file = $r->file('imagearticle');
            $name = $file->getClientOriginalName();
            //Image::make($file)->save($pub.$name);
            $article->imagearticle = $name;
        }
        $article->save();

        session()->flash("success", "Article a ete bien enregistré !!");

        return redirect('/admin/articles');
    }

    public function edit($id)
    {
        $categories = Categorie::all();
        $article = Article::find($id);

        return view('pages.article.edit', ['categories' => $categories, 'article' => $article]);
    }

    public function update(articleRequest $r, $id)
    {
        $article = Article::find($id);
        $article->nomarticle = $r->input('nomarticle');
        $article->descriptionarticle = $r->input('descriptionarticle');
        $article->prixarticle = $r->input('prixarticle');
        $article->categorie_id = $r->categories;

        if ($r->hasFile('imagearticle')) {
            //si l'image est supprimeé il returne true!
            $file_old = public_path("storage\photos\\" . $article->imagearticle);
            if (file_exists($file_old)) {
                unlink($file_old);
            }

            $pub = public_path("storage\photos\\");
            $file = $r->file('imagearticle');
            $name = $file->getClientOriginalName();
            //Image::make($file)->save($pub.$name);
            $article->imagearticle = $name;
        }
        $article->save();
        return redirect('/admin/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();
        return redirect("/admin/articles");
    }
}
