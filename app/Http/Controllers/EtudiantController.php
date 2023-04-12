<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    //
    public function ajouterEtudiant(Request $request){
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'dateNaissance' => 'required|date',
            'email' => 'required|email|unique:etudiants,email',
            'telephone' => 'required|numeric',
            'niveau' => 'required',
            'groupe' => 'required',
//            'photo' => 'required|image|mimes:jpeg,jpg,png',
            'motDePasse' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

//        $path = $request->file('photo')->store('public/images');
//        $path = str_replace('public/', '', $path);

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $sexe = $request->input('sexe');
        $dateNaissance = $request->input('dateNaissance');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $niveau = $request->input('niveau');
        $groupe = $request->input('groupe');
        $adresse = $request->input('Adresse');
        $motDePasse = $request->input('motDePasse');
        $nom_tuteur = $request->input('nom-pere');
        $prenom_tuteur = $request->input('prenom-pere');
        $email_pere = $request->input('email-pere');
        $telephone_pere = $request->input('telephone-pere');
        $adresse_pere = $request->input('adresse-pere');
        $cin = $request->input('CIN-pere');
        $parite = $request->input('parite');

        $imageName='';
        if ($request->hasFile('photoP') && $request->file('photoP')->isValid()) {
            $photoP = $request->file('photoP');
            $imageName = time() . '.' . $photoP->getClientOriginalExtension();
            $photoP->storeAs('public/images/profiles', $imageName);
        }

        $encriptedpw=bcrypt($motDePasse);

        try {
            DB::statement('EXEC insert_etudiant_class_user ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?', array($nom, $prenom , $sexe, $dateNaissance, $email, $telephone, $niveau, $groupe , $adresse, $encriptedpw, $nom_tuteur, $prenom_tuteur,$parite, $email_pere, $telephone_pere, $adresse_pere, $cin,$imageName  ));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errorET', $e->getMessage());
        }
        return redirect()->back()->with('success', 'L\'etudiant a été ajouté.');
    }

    public function changeMotDePasse(Request $request){

        if (Auth::attempt(['email' => session('email'), 'password' => $request->input('passwordActuel')]) ) {
            if ($request->input('newPassword')==$request->input('confirmPassword')){
                $user = User::where('email',session('email'))->first();
                $user->password = bcrypt($request->input('newPassword'));
                $user->save();
                return redirect()->back()->with('success', 'Mot de passe modife!');
            }else{
                return redirect()->back()->with('errors', 'Mot de passe et Confirmation sont pas identique!');
            }
        }
        return redirect()->back()->with('errors', 'Mot de passe incorrecte!');
    }
}
