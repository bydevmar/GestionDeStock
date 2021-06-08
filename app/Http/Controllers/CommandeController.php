<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function __construct(){
    }

    public function index(){
        $commandes = DB::table("commandes")
            ->join("clients", "clients.id", "=", "commandes.client_id")
            ->select('commandes.id', 'clients.nomclient', 'clients.prenomclient', 'commandes.datecommande', 'commandes.etatcommande')
            ->get();
        //dd($commandes);
        return view('pages.admin.commande.index', ['commandes' => $commandes]);
    }

    public function create(){
        $clietns = Client::all();
        return view('pages.admin.commande.create', ["clients" => $clietns]);
     }

    public function store(Request $r){
        $commande = new Commande();
        $commande->datecommande = $r->input('datecommande');
        $commande->client_id = $r->input('client');
        $commande->etatcommande = $r->input('etatcommande');
        
        $commande->save();
        return redirect("/admin/commandes");
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
