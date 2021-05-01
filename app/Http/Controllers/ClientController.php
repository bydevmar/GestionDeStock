<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('pages.client.index');
    }

    public function create(){ }

    public function store(Request $r){
    }

    public function edit($id){
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
