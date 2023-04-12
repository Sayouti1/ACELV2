<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsencesController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($request->input('absence')) {
            foreach ($request->input('absence') as $idEtudiant => $situation) {
                $absence = Absence::firstOrCreate([
                    'idEtudiant' => $idEtudiant,
                    'idProf' => session('id_prof'),
                    'laDate' => now()->format('Y-m-d H:00:00')
                ], [
                    'situation' => $situation
                ]);

            }

        }
        return redirect()->back()->with('success','Absence a ete enregistre');
    }
    public function justifierAbs(Request $request){
        $date = $request->input('dateAbsence');
        $photoP = $request->file('img');
        $imageName = time() . '.' . $photoP->getClientOriginalExtension();
        $photoP->storeAs('public/images/absences', $imageName);

        DB::table('absences')
            ->where('laDate', '=',$date)
            ->where('idEtudiant', session('id_etudiant'))
            ->update(['justifiant' => $imageName]);

        return redirect()->back()->with('success','Justification envoyé');
    }

}
