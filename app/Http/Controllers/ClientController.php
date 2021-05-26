<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $clients = Client::all();

        return view('pages.adminUser.client.index',['clients' => $clients]);
    }

    public function create(){ }

    public function store(Request $r){
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
