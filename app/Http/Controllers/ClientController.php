<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $clients = DB::table("clients")
            ->join("villes", "clients.ville_id", "=", "villes.id")
            ->select('clients.id','clients.nomclient','clients.prenomclient','villes.nomville','clients.adresseclient','clients.created_at')
            ->get();

        return view('pages.adminUser.client.index', ['clients' => $clients]);
    }

    public function create()
    {
        $villes = Ville::all();
        return view('pages.adminUser.client.create',["villes"=>$villes]);
    }

    public function store(Request $r)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $r, $id)
    {
    }

    public function destroy($id)
    {
    }
}
