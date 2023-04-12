<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatiereController extends Controller
{
    public function listeMatiere()
    {
        $matieres = DB::table('matieres')
            ->select('matieres.id_matiere', 'matieres.libele', DB::raw('COUNT(professeurs.matiere) as count'))
            ->leftJoin('professeurs', 'matieres.id_matiere', '=', 'professeurs.matiere')
            ->groupBy('matieres.id_matiere', 'matieres.libele')
            ->get();

        return view('Admin/matieres', ['matieres' => $matieres]);
    }

    public function ajouterMatiere(Request $request){
        $validator = Validator::make($request->all(), [
            'matiereID' => 'required',
            'matiere' => 'required|unique:matiere,libele',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $matiereID = strtolower($request->input('matiereID'));
        $matiere = $request->input('matiere');
        DB::table('matieres')->insert(
            array('id_matiere' => $matiereID , 'libele' => $matiere)
        );
        return redirect()->back()->with('success', 'La matiere a été ajoutée.');
    }

}
