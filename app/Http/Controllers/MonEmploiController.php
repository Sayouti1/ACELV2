<?php

namespace App\Http\Controllers;
use App\Models\Classs;
use App\Models\EmploiTemps;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Matieres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MonEmploiController extends Controller
{
    public function index2()
    {
        $nbrGroupe = DB::table('emploi_temps')
            ->select('id_group', 'id_niveau')
            ->distinct()
            ->where('id_prof', '=', session('id_prof'))
            ->get();
        $nbrSeance = DB::table('emploi_temps')
            ->select('id_prof')
            ->where('id_prof', '=', 100)
            ->get();



        $etList = EmploiTemps::where('id_prof', session('id_prof'))->get();
        $timetable = array();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

        // Initialize the timetable with empty strings
        foreach ($days as $day) {
            for ($i = 1; $i <= 4; $i++) {
                $timetable[$day][$i] = '';
            }
        }

        // Populate the timetable with subjects from the emploi_temps table
        foreach ($etList as $et) {
            $subject = $this->getSubjectName($et->id_matiere);
            if ($subject) {
                $timetable[$et->jour][$et->seance] .= ($timetable[$et->jour][$et->seance] ? '<br>' : '') . $subject;
            }
        }

        return view('Professeur/EmploiProf', compact('timetable', 'days'))->with('nbrGroupe',$nbrGroupe->count())->with('nbrSeance',$nbrSeance->count());

    }
    public function index()
    {

        $userEmail = Auth::user()->email;
        $etudiant = Etudiant::where('email', $userEmail)->value('id_etudiant');
        $groupId = Classs::where('id_etudiant', $etudiant)->value('id_group');

        $etList = EmploiTemps::where('id_group', $groupId)->get();
        $timetable = array();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

        // Initialize the timetable with empty strings
        foreach ($days as $day) {
            for ($i = 1; $i <= 4; $i++) {
                $timetable[$day][$i] = '';
            }
        }

        // Populate the timetable with subjects from the emploi_temps table
        foreach ($etList as $et) {
            $subject = $this->getSubjectName($et->id_matiere);
            if ($subject) {
                $timetable[$et->jour][$et->seance] .= ($timetable[$et->jour][$et->seance] ? '<br>' : '') . $subject;
            }
        }

        return view('Etudiant/EmploiEtudiant', compact('timetable', 'days'));

    }



    private function getSubjectName($id_matiere)
    {
        $subject = Matieres::where('id_matiere', $id_matiere)->first();
        return ($subject) ? $subject->libele : '';
    }

    public function ajouterSeance(Request $request){
        $res = DB::table('emploi_temps')
            ->select(DB::raw('count(*) as nbr'))
            ->where('seance', '=', $request->input('seance'))
            ->where('jour', '=', $request->input('jour'))
            ->where('id_group', '=', $request->input('id_group'))
            ->where('id_niveau', '=', $request->input('niveau'))
            ->value('nbr');

        if ($res > 0){
            return redirect()->back()->with('classOccupe', 'La classe a une seance deja ?');
        }

        $res1 = DB::table('emploi_temps')
            ->select(DB::raw('count(*) as nbr'))
            ->where('jour', '=', $request->input('jour'))
            ->where('seance', '=', $request->input('seance'))
            ->where('id_prof', '=', $request->input('id_prof'))
            ->value('nbr');

        if ($res1 > 0){
            return redirect()->back()->with('profOccupe', 'Le professeur a une seance   ');
        }
        DB::table('emploi_temps')->insert([
            'jour' => $request->input('jour'),
            'id_prof' => $request->input('id_prof'),
            'id_matiere' =>$request->input('id_matiere'),
            'id_niveau' =>$request->input('niveau'),
            'id_group' => $request->input('id_group'),
            'seance' => $request->input('seance')
        ]);
        return redirect()->back()->with('success', 'Seance ajoute avec succes');

    }
    public function supprimerSeance(Request $request){
        DB::table('emploi_temps')
            ->where('id_niveau', '=', $request->input('niveau1'))
            ->where('id_group', '=', $request->input('group1'))
            ->where('jour', '=', $request->input('jour'))
            ->where('seance', '=', $request->input('seance'))
            ->delete();
        return redirect()->back()->with('seanceSupprime', 'Modification sauvegarde');

    }
}
