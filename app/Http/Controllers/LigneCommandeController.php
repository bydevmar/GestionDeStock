<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneCommandeController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $lignecommandes = DB::table("lignecommandes AS lc")
            ->join("commandes AS cm", "cm.id", "=", "lc.commande_id")
            ->join("articles as ar","ar.id","=","lc.article_id")
            ->join("clients as cl","cm.client_id","=","cl.id")
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

    public function create(){ 
        
    }

    public function store(Request $r){
    }

    public function edit($commande_id,$article_id){
        return dd($commande_id.'       '.$article_id);
    }

    public function update(Request $r,$id){}

    public function destroy($id){}


}
