<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AjoutGroupController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'niveau' => 'required',
            'lib_group' => 'required',
            'nbr_etud' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }



        $niv = $request->input('niveau');
        $lib_group = $request->input('lib_group');
        $nbr_etud = $request->input('nbr_etud');

        $niveau = DB::table('niveaux')->where('id_niveau', $niv)->first();
        $niveauId = $niveau->id_niveau;

        $count = DB::table('class')
            ->join('groupe', 'class.id_group', '=', 'groupe.id_group')
            ->where('class.id_niveau', '=', $niveauId)
            ->where('groupe.libele', '=', $lib_group)
            ->count();
            if ($count > 0) {
                return redirect()->back()->with('errors', 'Groupe déja existe ');
            } else {

                DB::table('groupe')->insert(['libele' => $lib_group, 'NbEtudiant' => $nbr_etud]);
                return redirect()->back()->with('success', 'groupe a ete ajoute');

            }



        // add any additional logic or redirect as needed
    }

    public function getGroupsByLevel($level_id) {
        /*$groups = DB::table('class')->select('*')->distinct('id_group')->where('id_niveau', $level_id)
            ->get();*/
        $groups = DB::table('class')
            ->select('id_group', DB::raw('COUNT(id_etudiant) AS student_count'))->where('id_niveau','=',$level_id)
            ->groupBy('id_group')
            ->get();

        return view('Admin/GererGroupes', ['groups' => $groups,'id_niveau'=>$level_id]);
    }

}
