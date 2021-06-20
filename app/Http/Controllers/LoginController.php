<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $re)
    {
        if($re->session()->get("who") && $re->session()->get("admin")){
            return redirect("/admin/dashboard");
        }else if($re->session()->get("who") && !$re->session()->get("admin")){
            //return redirect("/client/dashboard");
        }
        return view('pages.login.login');
    }

    public function LogIn(Request $re)
    {
        $radio = $re->usertype;
        if ($radio == "usertypeadmin") {
            $user = User::where('email', '=', $re->email)->first();

            if ($user) {
                if ($re->password == $user->password) {
                    $re->session()->put('who', $user);
                    $re->session()->put('admin', true);
                    return redirect("/admin/dashboard");
                }
            }
            return back()->with('fail', "email ou mot de passe incorrecte!");
        } else if ($radio == "usertypeclient") {
            $user = Client::where('emailclient', '=', $re->email)->first();

            if ($user) {
                if ($re->password == $user->password) {
                    $re->session()->put('who', $user);
                    $re->session()->put('admin', false);
                    //return redirect("/admin/dashboard");
                }
            }
            return back()->with('fail', "email ou mot de passe incorrecte!");
        }
    }
}
