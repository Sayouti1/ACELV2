<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function etudiantHome()
    {
        $annonces = DB::table('annonces')
            ->select('*')
            ->get();
        return view('Etudiant/acceuil', ['annonces' => $annonces]);
    }
    public function professeurHome()
    {
        $annonces = DB::table('annonces')
            ->select('*')
            ->get();
        return view('Professeur/AcceuilProfesseur', ['annonces' => $annonces]);
    }
    public function adminHome()
    {
        return view('Admin/AdminAcceuil');
    }

}
