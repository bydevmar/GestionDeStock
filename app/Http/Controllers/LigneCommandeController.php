<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        return view('pages.lignecommande.index');
    }

    public function create(){ }

    public function store(Request $r){
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}


}
