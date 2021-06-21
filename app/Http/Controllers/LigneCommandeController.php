<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use App\Models\CommandeArticle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneCommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $lignecommandes = DB::table("commande_article AS lc")
            ->join("commandes AS cm", "cm.id", "=", "lc.commande_id")
            ->join("articles as ar", "ar.id", "=", "lc.article_id")
            ->join("clients as cl", "cm.client_id", "=", "cl.id")
            ->select(
                "lc.commande_id",
                "lc.quantite",
                "lc.article_id as article_id",

                "ar.nomarticle",
                "ar.descriptionarticle",

                "cl.id as client_id",
                "cl.nomclient",
                "cl.prenomclient",

                "cm.etatcommande",
                "cm.datecommande"
            )
            ->whereNull("cl.deleted_at")
            ->get();
        return view('pages.admin.lignecommande.index', ['lignecommandes' => $lignecommandes]);
    }

    public function create()
    {
        $commandes = Commande::all();
        $articles = Article::all();
        return view('pages.admin.lignecommande.create', ["commandes" => $commandes, "articles" => $articles]);
    }

    public function store(Request $r)
    {
        $lignecommande = DB::table('commande_article')
            ->where('commande_id',  $r->input('commande'))
            ->where("article_id", $r->input('article'))
            ->first();
        if (!$lignecommande) {
            $lignecommande = new CommandeArticle();
            $lignecommande->commande_id = $r->input('commande');
            $lignecommande->article_id = $r->input('article');
            $lignecommande->quantite = $r->input('quantite');
            session()->flash("success", "Ligne de Commande a été bien enregistré !!");
            $lignecommande->save();
            return redirect('/admin/lignecommandes');
        }
        return dd("Ligne commande exist deja!!");
    }

    public function edit($commande_id, $article_id)
    {
        $lignecommande = DB::table('commande_article')
            ->where('commande_id',  $commande_id)
            ->where("article_id", $article_id)
            ->first();
        if ($lignecommande) {
            $commandes = Commande::all();
            $articles = Article::all();
            return view('pages.admin.lignecommande.edit', ["commandes" => $commandes, "articles" => $articles, "lignecommande" => $lignecommande]);
        }
        return redirect('/admin/lignecommandes');
    }

    public function update(Request $r, $commande_id, $article_id)
    {
        $result = 0;
        try{
            $result = DB::table('commande_article')
            ->where('commande_id', $commande_id)
            ->where('article_id', $article_id)
            ->update([
                'commande_id' => $r->input('commande'), 'article_id' => $r->input('article'), 'quantite' =>  $r->input('quantite')
            ]);
            session()->flash("success", "Ligne de Commande été bien modifié !!");
        }catch(Exception $e){
            dd("Exception LigneCommandeController Update: ".$e);
        }
        
        if($result == 1){
            return redirect('/admin/lignecommandes');
        }
        
        return redirect('/admin/lignecommandes/' . $commande_id . '/' . $article_id . '/' . 'edit');
    }

    public function destroy($commande_id, $article_id)
    {
        $result = 0;
        try{
            $result = DB::table('commande_article')
            ->where('commande_id', $commande_id)
            ->where('article_id', $article_id)
            ->delete();
        }catch(Exception $e){
            dd("Exception LigneCommandeController Update: ".$e);
        }
        
        if($result == 1){
            session()->flash("success", "Ligne de Commande a été bien supprimé !!");
            return redirect('/admin/lignecommandes');
        }
    }
}