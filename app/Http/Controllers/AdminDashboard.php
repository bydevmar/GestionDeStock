<?php

namespace App\Http\Controllers;
class AdminDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index(){
        return view('pages.admin.dashboard.index');
    }
}
