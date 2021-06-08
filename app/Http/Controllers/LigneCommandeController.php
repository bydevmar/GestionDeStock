<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneCommandeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $lignecommandes = DB::table("lignecommandes AS lc")
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
        $lignecommande = DB::table('lignecommandes')
            ->where('commande_id',  $r->input('commande'))
            ->where("article_id", $r->input('article'))
            ->first();
        if (!$lignecommande) {
            $lignecommande = new LigneCommande();
            $lignecommande->commande_id = $r->input('commande');
            $lignecommande->article_id = $r->input('article');
            $lignecommande->quantite = $r->input('quantite');
            $lignecommande->save();
            return redirect('/admin/lignecommandes');
        }
        return dd("Ligne commande exist deja!!");
    }

    public function edit($commande_id, $article_id)
    {

    }

    public function update(Request $r, $id)
    {
    }

    public function destroy($id)
    {
    }
}
