<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login.login');
    }

    public function logIn(Request $re)
    {
        $radio = $re->usertype;
        return dd($radio);
        if ($radio == "usertypeadmin") {
            $user = User::where('email', '=', $re->email)->first();
            if (!$user) {
                return back()->with('fail', "email non trouvé!");
            } else {
                if ($re->password == $user->password) {
                    $re->session()->put('loggedadmin', $user->id);
                    //redirect to admin dashboard
                } else {
                    return back()->with('fail', "mot de passe incorrecte!");
                }
            }
        }else{
            $user = Client::where('email', '=', $re->email)->first();
            if (!$user) {
                return back()->with('fail', "email non trouvé!");
            } else {
                if ($re->password == $user->password) {
                    $re->session()->put('loggedclient', $user->id);
                    //redirect to client dashboard
                } else {
                    return back()->with('fail', "mot de passe incorrecte!");
                }
            }
        }
    }
}
