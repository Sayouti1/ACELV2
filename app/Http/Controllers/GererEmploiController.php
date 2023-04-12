<?php

namespace App\Http\Controllers;

use App\Models\EmploiTemps;
use App\Models\Matieres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GererEmploiController extends Controller
{
    public function index($id_group)
    {
        $etList = EmploiTemps::where('id_group', $id_group)->get();
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

        return view('Admin/EmploiAGerer', compact('timetable', 'days'));

    }



    private function getSubjectName($id_matiere)
    {
        $subject = Matieres::where('id_matiere', $id_matiere)->first();
        return ($subject) ? $subject->libele : '';
    }
}
