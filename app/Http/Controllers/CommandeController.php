<?php

namespace App\Http\Controllers;

use App\Http\Requests\commandeRequest;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(){
        $commandes = DB::table("commandes")
            ->join("clients", "clients.id", "=", "commandes.client_id")
            ->select('commandes.id AS commande_id',"clients.id AS client_id", 'clients.nomclient', 'clients.prenomclient', 'commandes.datecommande', 'commandes.etatcommande')
            ->whereNull("commandes.deleted_at")
            ->get();
        return view('pages.admin.commande.index', ['commandes' => $commandes]);
    }

    public function create(){
        $clietns = Client::all();
        return view('pages.admin.commande.create', ["clients" => $clietns]);
     }

    public function store(commandeRequest $r){
        $commande = new Commande();
        $commande->datecommande = $r->input('datecommande');
        $commande->client_id = $r->input('client');
        $commande->etatcommande = $r->input('etatcommande');
        session()->flash("success", "Commande a été bien enregistré !!");
        $commande->save();
        return redirect("/admin/commandes");
    }

    public function edit($id){
        $commande = Commande::find($id);
        $clients = Client::all();
        if(!$commande){
            return redirect('/admin/commandes');
        }
        return view("pages.admin.commande.edit", ['clients' => $clients, 'commande' => $commande]);
    }

    public function update(commandeRequest $r,$id){
        $commande = Commande::find($id);
        if($commande){
            $commande->datecommande = $r->input('datecommande');
            $commande->client_id = $r->input('client');
            $commande->etatcommande = $r->input('etatcommande');
            $commande->save();
            session()->flash("success", "Commande a été bien modifié !!");
            return redirect("/admin/commandes");
        }
    }

    public function destroy($id){
        $commande = Commande::find($id);
        if($commande){
            $commande->delete();
            session()->flash("success", "Commande a été bien supprimé !!");
            return redirect("/admin/commandes");
        }
        else{
            return dd("cette commande n'exist pas!!");
        }
    }
}
