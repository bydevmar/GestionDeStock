<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function index()
    {
        $clients = DB::table("clients")
            ->join("villes", "clients.ville_id", "=", "villes.id")
            ->select('clients.id', 'clients.nomclient', 'clients.prenomclient', 'villes.nomville', 'clients.adresseclient', 'clients.created_at')
            ->get();

        return view('pages.adminUser.client.index', ['clients' => $clients]);
    }

    public function create()
    {
        $villes = Ville::all();
        return view('pages.adminUser.client.create', ["villes" => $villes]);
    }

    public function store(Request $r)
    {
        $client = Client::where('emailclient', '=', $r->emailclient)->first();
        if (!$client) {
            if ($r->input('password') == $r->input('confirmpassword')) {
                $client = new Client();
                $client->nomclient = $r->input('nomclient');
                $client->prenomclient = $r->input('prenomclient');
                $client->ville_id = $r->villes;
                $client->telephoneclient = $r->input('telephoneclient');
                $client->adresseclient = $r->input('adresseclient');
                $client->emailclient = $r->input('emailclient');
                $client->password = Hash::make($r->input('password'));
                $client->save();
                return redirect("/admin/clients");
            }
            return redirect('/admin/clients/create');
        } else {
            return redirect('/admin/clients/create');
        }
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $villes = Ville::all();
        if(!$client){
            return redirect('/admin/clients');
        }
        return view("pages.adminUser.client.edit", ['client' => $client, 'villes' => $villes,'']);
    }

    public function update(Request $r, $id)
    {
        $client = Client::where('id', '=', $id)->first();
        if ($client) {
                $client->nomclient = $r->input('nomclient');
                $client->prenomclient = $r->input('prenomclient');
                $client->ville_id = $r->villes;
                $client->telephoneclient = $r->input('telephoneclient');
                $client->adresseclient = $r->input('adresseclient');
                if($r->input('password') != ""){
                    if(!Hash::check($r->password,$client->password)){
                        $client->password = $r -> input('password');
                    }
                }                
                $client->save();
                return redirect("/admin/clients");
        } else {
            return redirect("/admin/clients");
        }
    }


    public function destroy($id)
    {
        $client = Client::find($id);

        $client->delete();
        return redirect("/admin/clients");
    }
}
