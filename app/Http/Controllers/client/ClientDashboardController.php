<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    //
    public function index(){
        return view('pages.client.dashboard.index');
    }
}
