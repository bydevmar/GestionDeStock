<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function __construct(){
    }

    public function index(){
        $commandes = DB::table("commandes")
            ->join("clients", "clients.id", "=", "commandes.client_id")
            ->select('clients.id', 'clients.nomclient', 'clients.prenomclient', 'commandes.datecommande', 'commandes.etatcommande')
            ->get();
        //dd($commandes);
        return view('pages.admin.commande.index', ['commandes' => $commandes]);
    }

    public function create(){ }

    public function store(Request $r){
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
