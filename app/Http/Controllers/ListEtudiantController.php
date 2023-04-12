<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListEtudiantController extends Controller
{
    public function index()
    {
        $etudiants = DB::table('etudiants')
                        ->join('tuteur', 'etudiants.id_parent', '=', 'tuteur.CIN')
                        ->select('etudiants.*', 'tuteur.nom as tuteur_nom')
                        ->get();
        return view('Admin/list-etudiants', compact('etudiants'));
    }

    public function listGroup(){
        $idGroup = request()->query('idGroup');
        $idNiveau = request()->query('idNiveau');

        $etudiants = DB::table('etudiants')
            ->join('class', 'etudiants.id_etudiant', '=', 'class.id_etudiant')
            ->where('class.id_group', '=', $idGroup)
            ->where('class.id_niveau', '=', $idNiveau)
            ->select('etudiants.*')
            ->get();
        $nivea = DB::table('niveaux')->where('id_niveau','=',$idNiveau)->value('libele');
        $groupe = DB::table('groupe')->where('id_group','=',$idGroup)->value('libele');
        return view('Admin/list-etudiants',['etudiants'=>$etudiants])
            ->with('success11', 'Liste du Niveau: '.$nivea.' Groupe: '.$groupe);
    }
    public function searchEt(Request $request)
    {
        $etudiants = DB::table('etudiants');

        if ($request->filled('searchid')) {
            $etudiants->where('id_etudiant', $request->input('searchid'));
        }

        if ($request->filled('searchnom')) {
            $etudiants->where('nom', 'like', '%'.$request->input('searchnom').'%');
        }

        if ($request->filled('searchemail')) {
            $etudiants->where('email', 'like', '%'.$request->input('searchemail').'%');
        }

        $etudiants = $etudiants->get();

        return view('Admin/list-etudiants', compact('etudiants'));
    }
    public function  searchETProf(Request $request){
        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();
        $etudiants = DB::table('etudiants as et')
            ->select(DB::raw('DISTINCT et.id_etudiant, et.nom, et.prenom, et.date_naissaince, et.telephone, et.adresse, ni.libele as nlibele, gr.libele as glibele'))
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->join('groupe as gr', 'em.id_group', '=', 'gr.id_group')
            ->join('niveaux as ni', 'em.id_niveau', '=', 'ni.id_niveau')
            ->where('em.id_prof', '=', session('id_prof'));
        if ($request->input('niveau')!= 'hidden-opt'){
            $etudiants->where('em.id_niveau','=',$request->input('niveau'));
        }
        if ( $request->input('groupe') != '0') {
            $etudiants->where('em.id_group','=',$request->input('groupe'));
        }
        if ($request->filled('nomEt')){

            $etudiants->where('et.nom', 'LIKE', '%' . $request->input('nomEt') . '%');

        }
        $etudiants = $etudiants->get();

        return view('Professeur/ListEtudiantProf', [        'etudiants' => $etudiants,        'listeNiveau' => $listeNiveau    ]);

    }


}
