<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class userController extends Controller
{
    public function index()
    {
        return view('login');
    } 

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email , 'password' => $password ];
        if(Auth::attempt($credentials))
        {
            $profile = Auth::user();
            $request->session()->regenerate(true); 
            return to_route('products')->with('success', 'Vous êtes bien connecté '.$email." .");

        }else{
            // shi haja ghalta
            return back()->withErrors([
            'email'=> 'Email ou mot de passe incorrect.'
            ])->onlyInput('email');
        }
    }

}
