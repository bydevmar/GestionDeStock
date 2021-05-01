<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function __construct(){
    }

    public function index(){
        return view('pages.commande.index');
    }

    public function create(){ }

    public function store(Request $r){
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
