<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index(){
        return view('pages.admin.dashboard.index');
    }
}
