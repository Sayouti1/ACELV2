<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('welcome');
    }

    public function preinscrire(Request $request){
        $lieu_nai = $request->input('lieu-nai');
        $nom = $request->input('pre-inscri-nom');
        $prenom = $request->input('pre-inscri-prenom');
        $date = $request->input('pre-inscri-year').'-'.$request->input('pre-inscri-month').'-'.$request->input('pre-inscri-day');
        $xecole = $request->input('x-ecole');
        $niveau = $request->input('niveau');
        $parentnom = $request->input('pre-inscri-nom-parent');
        $parentprenom = $request->input('pre-inscri-prenom-parent');
        $parentemail = $request->input('e-mail-parent');
        $parenttel = $request->input('tel-parent');
        $profession = $request->input('profession-parent');

        DB::table('preinscri')->insert([
            'nom_eleve' => $nom,
            'prenom_eleve' => $prenom,
            'date_naissance' => $date,
            'ecole_actuel' => $xecole,
            'lieu_naissance' => $lieu_nai,
            'class_envisage' => $niveau,
            'nom_parent' => $parentnom,
            'prenom_parent' => $parentprenom,
            'email_parent' => $parentemail,
            'telephone_parent' => $parenttel,
            'prefession' => $profession
        ]);
        return redirect()->back()->with('preinSuccess','Merci pour votre inscription ');
    }
    public function photo(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/profiles', $imageName);

        $model = new annonce();
        $model->content = $imageName;
        $model->save();

        return back()->with('model', $model);
    }



}
