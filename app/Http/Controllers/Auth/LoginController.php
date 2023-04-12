<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (auth()->attempt(['email'=>$input["email"],'password'=>$input["password"]])){
            $user = Auth::user();

            session(['user_id' => $user->id, 'user_mail' => $user->email]);

            if (auth()->user()->role == 'admin'){
                return redirect()->route('home.admin');
            }
            else if (auth()->user()->role == 'professeur'){

                $professeur = Professeur::where('email', $user->email)->first();
                $carbonDate = Carbon::createFromFormat('Y-m-d', $professeur->date_adhesion);
                $date_adhesion = $carbonDate->format('d M Y');

                session(['id_prof' => $professeur->id_prof,'nom'=>$professeur->nom,'prenom'=>$professeur->prenom,'matiere'=>$professeur->matiere,'adresse'=>$professeur->adresse, 'email' => $professeur->email,'date_adhesion'=>$date_adhesion,'password'=>$user->getAuthPassword()]);

                return redirect()->route('home.professeur');
            }
            else{
                $etudiant = Etudiant::where('email', $user->email)->first();
                $carbonDate = Carbon::createFromFormat('Y-m-d', $etudiant->date_adhesion);
                $date_adhesion = $carbonDate->format('d M Y');

                session(['id_etudiant' => $etudiant->id_etudiant,'nom'=>$etudiant->nom,'photo'=>$etudiant->photo,'prenom'=>$etudiant->prenom,'adresse'=>$etudiant->adresse, 'email' => $etudiant->email,'date_adhesion'=>$date_adhesion,'password'=>$user->getAuthPassword()]);
                return redirect()->route('home.etudiant');
            }
        }
        else{
            return redirect()->route('login')->with('error', ' L\'email ou le mot de passe est incorrect !!!');

        }
    }
}
