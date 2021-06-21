<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $re)
    {
        $isAdmin =  Cookie::get("isAdmin");
        if($isAdmin && Hash::check(true ,$isAdmin) && Cookie::get("who")){
            return redirect("/admin/dashboard"); 
        }else if($isAdmin && Hash::check(false ,$isAdmin) && Cookie::get("who")){
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
                    Cookie::queue("who",$user);
                    Cookie::queue("isAdmin",Hash::make(true));
                    return redirect("/admin/dashboard");
                }
            }
            return back()->with('fail', "email ou mot de passe incorrecte!");
        } else if ($radio == "usertypeclient") {
            $user = Client::where('emailclient', '=', $re->email)->first();

            if ($user) {
                if ($re->password == $user->password) {
                    Cookie::queue("who",$user);
                    Cookie::queue("isAdmin",Hash::make(false));
                    //return redirect("/client/dashboard");
                }
            }
            return back()->with('fail', "email ou mot de passe incorrecte!");
        }
    }
}
