<?php

namespace App\Http\Controllers;
class AdminDashboard extends Controller
{
    public function index(){
        return view('pages.admin.dashboard.index');
    }
}
