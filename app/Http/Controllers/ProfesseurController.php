<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Exercice;
use App\Models\Professeur;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfesseurController extends Controller
{
    //
    public function index() {
        $matieres = DB::table('matieres')
            ->select('*')
            ->get();
        return view('Admin/AjouterProfesseur',['matieres'=>$matieres]);
    }
    public function ajouterProf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'dateNaissance' => 'required|date',
            'telephone' => 'required|numeric',
            'dateEntree' => 'required|date',
            'deplome' => 'required',
            'salaire' => 'required|numeric',
            'adresse' => 'required',
            'matiere' => 'required',
            'ville' => 'required',
            'zip' => 'required|numeric',
            'email' => 'required|email|unique:professeurs,email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $sexe = $request->input('sexe');
        $dateNaissance = $request->input('dateNaissance');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $wallet = $request->input('portefeuille');
        $deplome = $request->input('deplome');
        $adresse = $request->input('adresse');
        $ville = $request->input('ville');
        $zip = $request->input('zip');
        $cin = $request->input('cin');
        $password =bcrypt( $request->input('password'));
        $dateEntree = $request->input('dateEntree');
        $matiere = $request->input('matiere');
        $salaire = $request->input('salaire');

        try {
            DB::statement('EXEC AjouterProfesseur1 ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', array($nom  ,$prenom,$sexe,$email,$dateEntree,$telephone,$adresse,$ville,$dateNaissance,$deplome,$salaire,$cin,$matiere,$zip,$password,$wallet));
        } catch (QueryException $e) {
            // handle exception
            return redirect()->back()->withInput()->with('errorET', $e->getMessage());
        }
//        $prof = new Professeur();
//        $res = $prof->AjouterProfesseur($request->input('nom'),$request->input('prenom'),$request->input('sexe'),$request->input('email'),$request->input('telephone'),$request->input('dateNaissance'),$request->input('dateEntree'),$request->input('deplome'),$request->input('salaire'),$request->input('cin'),$request->input('matiere'),$request->input('adresse'),$request->input('ville'),$request->input('zip'),$request->input('password'),$request->input('portefeuille'));

        return redirect()->back()->with('success', 'Le professeur a été ajouté.');

    }
    public function modifierProf(Request $request){
        $id_prof = $request->input('id_prof');
        $nom =  $request->input('newnom');
        $prenom =  $request->input('newprenom');
        $sexe =  $request->input('newsexe');
        $email =  $request->input('newemail');
        $telephone =  $request->input('newtelephone');
        $adresse =  $request->input('newadresse');
        $ville =  $request->input('newville');
        $wallet =  $request->input('newportefeuille');
        $sallaire =  $request->input('newsalaire');
        $diplome =  $request->input('newdeplome');
        $zip =  $request->input('newzip');
        $cin =  null;
        $dateNaissance =  $request->input('newdateNaissance');
        if (!(empty($request->input('newmotDePasse')))){
            $motDePasse =  bcrypt($request->input('newmotDePasse'));
            DB::statement("EXECUTE modifierProfesseur
                @id_prof = $id_prof,
                @nom = '$nom',
                @prenom = '$prenom',
                @sexe = '$sexe',
                @email = '$email',
                @telephone = '$telephone',
                @adresse = '$adresse',
                @ville = '$ville',
                @wallet = '$wallet',
                @sallaire = $sallaire,
                @diplome = '$diplome',
                @zip = '$zip',
                @cin = '$cin',
                @dateNaissance = '$dateNaissance',
                @password = '$motDePasse'"
            );
        }else{
            DB::statement("EXECUTE modifierProfesseur
                @id_prof = $id_prof,
                @nom = '$nom',
                @prenom = '$prenom',
                @sexe = '$sexe',
                @email = '$email',
                @telephone = '$telephone',
                @adresse = '$adresse',
                @ville = '$ville',
                @wallet = '$wallet',
                @sallaire = $sallaire,
                @diplome = '$diplome',
                @zip = '$zip',
                @cin = '$cin',
                @dateNaissance = '$dateNaissance'"
            );
        }

        return redirect()->back()->with('success', 'Le professeur a été modifie.');
    }

    public function saveExerciceCours(Request $request){
            if ($request->input('Id') == 'note-important'){
                $photoP = $request->file('photo');
                $imageName = time() . '.' . $photoP->getClientOriginalExtension();
                $photoP->storeAs('public/images/coursEtExercices', $imageName);

                $exercice = new Exercice;
                $exercice->id_prof = session('id_prof');
                $exercice->titre = $request->input('title');
                $exercice->descripiton = $request->input('description');
                $exercice->lien = $imageName;
                $exercice->id_group= $request->input('groupe');
                $exercice->id_niveau=$request->input('niveau');

                $exercice->save();
                return redirect()->back()->with('success', 'Exercice publié avec succes');

            }
            if ($request->input('Id') == 'all-category'){
                $photoP = $request->file('photo');
                $imageName = time() . '.' . $photoP->getClientOriginalExtension();
                $photoP->storeAs('public/images/coursEtExercices', $imageName);

                $cour = new Cour;
                $cour->id_prof = session('id_prof');
                $cour->nom = $request->input('title');
                $cour->descripiton = $request->input('description');
                $cour->lien = $imageName;
                $cour->id_group= $request->input('groupe');
                $cour->id_niveau=$request->input('niveau');

                $cour->save();
                return redirect()->back()->with('success', 'Cour publié avec succes');

            }
            else{
                return redirect()->back()->with('success', 'EROOOOOOOOR');
            }
    }

}
