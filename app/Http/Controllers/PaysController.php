<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaysController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        return view('pages.article.index');
    }

    public function create(){ }

    public function store(Request $r){
        return view('pages.article.index');
    }

    public function edit($id){
        return view("pages.article.edit");
    }

    public function update(Request $r,$id){}

    public function destroy($id){}
}
