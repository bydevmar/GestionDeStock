<?php

namespace App\Http\Controllers;

use App\Http\Requests\articleRequest;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $articles = Article::all();
        return view('pages.admin.article.index', ['articles' => $articles]);
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('pages.admin.article.create', ['categories' => $categories]);
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
            Image::make($file)->save($pub . $name);
            $article->imagearticle = $name;
        }
        $article->save();

        session()->flash("success", "Article a été bien enregistré !!");

        return redirect('/admin/articles');
    }

    public function edit($id)
    {
        $categories = Categorie::all();
        $article = Article::find($id);

        return view('pages.admin.article.edit', ['categories' => $categories, 'article' => $article]);
    }

    public function update(articleRequest $r, $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->nomarticle = $r->input('nomarticle');
            $article->descriptionarticle = $r->input('descriptionarticle');
            $article->prixarticle = $r->input('prixarticle');
            $article->categorie_id = $r->categories;

            if ($r->hasFile('imagearticle')) {
                $file_old = public_path("storage\photos\\" . $article->imagearticle);
                if (file_exists($file_old)) {
                    Storage::delete('/public/photos/' . $article->imagearticle);

                    $pub = public_path("storage\photos\\");
                    $file = $r->file('imagearticle');
                    $name = $file->getClientOriginalName();
                    Image::make($file)->save($pub.$name);
                    $article->imagearticle = $name;
                }
            }
            $article->save();
            session()->flash("success", "Article a été bien modifié !!");
            return redirect('/admin/articles');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            Storage::delete('/public/photos/' . $article->imagearticle);
            session()->flash("success", "Article a été bien supprimé !!");
        }
        return redirect("/admin/articles");
    }
}
