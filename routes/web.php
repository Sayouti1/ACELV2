<?php

use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListEtudiantController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\MonEmploiController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfesseurController;
use App\Mail\ConfirmationInscription;
use App\Models\annonce;
use App\Models\Cour;
use App\Models\Exercice;
use App\Models\Professeur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/preinscription',[HomeController::class,'preinscrire']);
/*
Route::get('/admin', function () {
    return view('Admin/admin');
});*/
//Route::get('/admin/home', function () {
//    return view('Admin/admin');
//});
/*Route::get('/AjouterEtudiant', function () {
    return view('Admin/AjouterEtudiant');
});
Route::get('/AjouterProfesseur', function () {
    return view('Admin/AjouterProfesseur');
});
Route::get('/payement', function () {
    return view('Admin/payement');
});
Route::get('/listeProfesseurs', function () {
    return view('Admin/listeProfesseurs');
});*/
/*
Route::get('/etudiant', function () {
    $annonces = DB::table('annonces')
        ->select('*')
        ->get();
    return view('Etudiant/acceuil', ['annonces' => $annonces]);
});*/
/*
Route::get('/etudiant/mescours', function () {
    $mesCours = DB::table('cours')
        ->select('*')
        ->get();
    return view('Etudiant/mescours', ['mesCours' => $mesCours]);
});
Route::get('/etudiant/monemploidutemps', function () {
    $emploi = DB::table('emploiTemps')
        ->select('*')
        ->where('idGroupe', '=', '1AG1')
        ->get();
    return view('Etudiant/emploiDuTemps', ['emploi' => $emploi]);
});
Route::get('/etudiant/mesnotes', function () {
    $notes = DB::table('notes')
        ->select('*')
        ->where('etudiant', '=', 'A123')
        ->get();
    return view('Etudiant/mesnotes', ['notes' => $notes]);
});
Route::get('/etudiant/mesabsences', function () {
    $absence = DB::table('absence')
        ->select('*')
        ->where('idEtudiant', '=', 'A123')
        ->get();
    return view('Etudiant/mesabsences', ['absence' => $absence]);
});
Route::get('/etudiant/traveauxafaire', function () {
    $devoir = DB::table('travailaFaire')
        ->select('*')
        ->get();
    return view('Etudiant/traveauxAFaire', ['devoirs' => $devoir]);
});
Route::get('/etudiant/get-cours', function (Request $request) {
    $cours = DB::table('cours')
        ->select('courID', 'nom', 'dateMiseEnLigne', 'lien')
        ->where('matiere', $request->input('name'))
        ->get();
    return response()->json($cours);
});*/

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

//etudiant
Route::middleware(['auth', 'user-role:etudiant'])->group(function () {
    Route::get("/etudiant", [LoginController::class, 'etudiantHome'])->name('home.etudiant');
    Route::get('/etudiant/mescours', function () {

        return view('Etudiant/MesCoursY');
    });
    Route::get('/etudiant/courslist',function (){
        $mesCours= DB::table('emploi_temps as em')
            ->join('class as cl', 'cl.id_group', '=', 'em.id_group')
            ->join('matieres as ma', 'ma.id_matiere', '=', 'em.id_matiere')
            ->join('professeurs as pr', 'pr.id_prof', '=', 'em.id_prof')
            ->select(DB::raw("DISTINCT ma.libele,pr.id_prof, pr.nom + ' ' + pr.prenom as Proof"))
            ->where('cl.id_etudiant', session('id_etudiant'))
            ->get();


        /*$mesCours = DB::table('cours as co')
            ->join('class as cl', function ($join) {
                $join->on('co.id_group', '=', 'cl.id_group')
                    ->on('co.id_niveau', '=', 'cl.id_niveau');
            })
            ->join('professeurs as pr', 'co.id_prof', '=', 'pr.id_prof')
            ->where('cl.id_etudiant', '=', session('id_etudiant'))
            ->select('co.*', DB::raw("CONCAT(pr.nom, ' ', pr.prenom) AS Prof"))
            ->get();*/


        return view('Etudiant/CoursList', ['mesCours' => $mesCours]);
    });
    Route::get('/etudiant/coursInfo/{id}',function ($id){

        $result = DB::table('class')
            ->select('id_niveau', 'id_group')
            ->where('id_etudiant', '=', session('id_etudiant'))
            ->first();

        $id_niveau = $result->id_niveau;
        $id_group = $result->id_group;

        $CourInfo = DB::table('cours')
            ->where('id_prof', $id)
            ->where('id_niveau', $id_niveau)
            ->where('id_group', $id_group )
            ->get();
/*

        $CourInfo = DB::table('cours')
            ->where('id', '=', $id)
            ->get();*/

        return view('Etudiant/CoursInfo',['CoursInfo'=>$CourInfo]);
    });
    Route::get('/etudiant/exercices/{id}',function ($id){

        $exercices = DB::table('exercices AS ex')
            ->select('ex.*')
            ->distinct()
            ->join('emploi_temps AS em', function ($join) {
                $join->on('em.id_prof', '=', 'ex.id_prof')
                    ->on('em.id_group', '=', 'ex.id_group')
                    ->on('em.id_niveau', '=', 'ex.id_niveau');
            })
            ->join('class AS cl', function ($join) {
                $join->on('em.id_group', '=', 'cl.id_group')
                    ->on('em.id_niveau', '=', 'cl.id_niveau');
            })
            ->where('em.id_matiere', '=', $id)
            ->where('cl.id_etudiant', '=', session('id_etudiant'))
            ->get();
        return view('Etudiant/ExercicesDiv',['exercices'=>$exercices]);
    });
    Route::get('/etudiant/monemploidutemps', 'App\Http\Controllers\MonEmploiController@index');
    /*Route::get('/etudiant/monemploidutemps', function () {
        $emploi = DB::table('emploiTemps')
            ->select('*')
            ->where('idGroupe', '=', '1AG1')
            ->get();
        return view('Etudiant/EmploiEtudiant');
    });*/
    Route::get('/etudiant/mesnotes', function () {
        $notes = DB::table('notes')
            ->join('matieres', 'notes.id_matiere', '=', 'matieres.id_matiere')
            ->select('notes.*', 'matieres.libele')
            ->where('id_etudiant', '=', session('id_etudiant'))
            ->get();

        return view('Etudiant/mesnotes', ['notes' => $notes]);
    });
    Route::get('/etudiant/mesabsences', function () {

        $absence = DB::table('absences')
            ->select('*')
            ->where('idEtudiant', '=', session('id_etudiant'))
            ->get();
        return view('Etudiant/mesabsences', ['absence' => $absence]);
    });
    Route::post('/justifier-absence', [AbsencesController::class,'justifierAbs'])->name('justifierAbsence');

    Route::get('/etudiant/traveauxafaire', function () {
        /*$devoir = DB::table('travailaFaire'), ['devoirs' => $devoir]
            ->select('*')
            ->get();*/
        $matieres = DB::table('matieres as ma')
            ->join('emploi_temps as em', 'ma.id_matiere', '=', 'em.id_matiere')
            ->join('class as cl', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->select('ma.*')
            ->where('cl.id_etudiant', '=', session('id_etudiant'))
            ->distinct()
            ->get();

        return view('Etudiant/traveauxAFaire',['matieres'=>$matieres]);
    });
    Route::get('/etudiant/get-cours', function (Request $request) {
        $cours = DB::table('cours')
            ->select('courID', 'nom', 'dateMiseEnLigne', 'lien')
            ->where('matiere', $request->input('name'))
            ->get();
        return response()->json($cours);
    });
    Route::get('/etudiant/Mon-compte', function () {
        return view('Etudiant/MonCompteEtudiant');
    });
    Route::post('/etudiant/changeinfos',[EtudiantController::class,'changeMotDePasse'])->name('etudiant.changeMotDePasse');
});


////admin
Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('/send-message', 'App\Http\Controllers\MessagerieController@sendMessage');

    Route::get('/Admin/Messagerie', 'App\Http\Controllers\MessagerieController@index1');

    Route::get('/compose-email1', function () {
        return view('Admin/ComposerEmail');
    });

    Route::get('/Messages/Recu1', 'App\Http\Controllers\MessagerieController@showReceivedMessages1');
    Route::get('/Messages/Envoyées1', 'App\Http\Controllers\MessagerieController@showSentMessages1');


    Route::get('/admin/Absences',function (){

//        $absences = Absence::where('statut', 'non')->get();
        // Assuming the model names are "Absence", "Etudiant", and "Class"
        // Assuming the model names are "Absence", "Etudiant", and "Class"
        $absences = DB::table('absences as ab')
            ->join('etudiants as et', 'ab.idEtudiant', '=', 'et.id_etudiant')
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->select('et.id_etudiant', DB::raw("CONCAT(et.nom, ' ', et.prenom) as nom"), 'et.telephone', 'cl.id_group', 'cl.id_niveau', 'ab.laDate', 'ab.situation','ab.justifiant')
            ->where('ab.statut', '=', 'non')
            ->get();



        return view('Admin/AbssenseAdmin',['absence'=>$absences]);
    });
    Route::get('/admin/preinscriptions',function(){
    $prein = DB::table('preinscri')->get();
    return view('Admin/PreInscriAdmin',['preinscr'=>$prein]);
    });
    Route::post('/emploi_du_temps/AjouterLaSeance',[MonEmploiController::class,'ajouterSeance']);
    Route::post('/emploi_du_temps/supprimerSeance',[MonEmploiController::class,'supprimerSeance']);

    Route::get("/admin/home", [LoginController::class, 'adminHome'])->name('home.admin');
    Route::get('/admin', function () {
        return view('Admin/AdminAcceuil');
    });
    Route::get('/get-groups-by-level/{id_niveau}', function($id_niveau) {
        $groupes = DB::table('class')
            ->join('groupe', 'groupe.id_group', '=', 'class.id_group')
            ->where('class.id_niveau', $id_niveau)
            ->select('groupe.libele', 'groupe.id_group')
            ->distinct()
            ->get();
        return response()->json($groupes);
    });
    Route::get('/get-professeurs-by-matiere/{id_matiere}', function($id_matiere) {
        $results = DB::table('professeurs')
            ->select('nom', 'prenom', 'id_prof')
            ->where('matiere', '=', $id_matiere)
            ->get();

        return response()->json($results);
    });

    Route::get('/AjouterEtudiant', function () {
        $niveaux = DB::table('niveaux')
            ->select('*')
            ->get();
        return view('Admin/AjouterEtudiant',['niveaux'=>$niveaux]);
    });
    Route::post('/AjouterEtudiant/ajouter', [EtudiantController::class, 'ajouterEtudiant'])->name('etudiant.ajouterEtudiant');

    Route::get('/AjouterProfesseur',[ProfesseurController::class,'index'])->name('professeur.index');
    Route::post('/modifier-prof',[ProfesseurController::class,'modifierProf'])->name('professeur.modifierProf');
    Route::post('/AjouterProfesseur/ajouter', [ProfesseurController::class, 'ajouterProf'])->name('professeur.ajouterProf');

    Route::get('/payement', function () {
        $salarie = DB::table('professeurs')
            ->select('*')
            ->get();
        $history = DB::table('history_paiement')
            ->select('*')
            ->get();

        return view('Admin/payement', ['salarie' => $salarie,'historique'=>$history]);
    });
    Route::get('/payementSuccess/{bene}/{mont}/{txid}', function ($bene,$mont,$txid) {
        DB::statement('EXEC ajouterTransaction ?, ?, ?', [
            $bene,
            $mont,
            $txid
        ]);

        return redirect('/payement')->with('success', 'Transaction Confirmée.');
    });

    Route::get('/notifications',function(){
        $annonces = DB::table('annonces')
            ->select('*')
            ->get();
        return view('Admin/Notifications', ['annonces' => $annonces]);
    })->name('admin.notifications');
    Route::get('/listeProfesseurs', function () {
        $listeprofesseurs = DB::table('professeurs')
            ->join('matieres', 'professeurs.matiere', '=', 'matieres.id_matiere')
            ->select('professeurs.*', 'matieres.libele')
            ->get();

        $countProfesseurs = $listeprofesseurs->count();
        return view('Admin/listeProfesseurs', ['listeprofesseurs' => $listeprofesseurs, 'countProfesseurs' => $countProfesseurs]);
    });
//    Route::get('/list-etudiants',function (){
//
//        $listeEtudiants = DB::table('etudiant')
//            ->select('*')
//            ->get();
//        return view('Admin/list-etudiants', ['listeEtudiants' => $listeEtudiants]);
//    });

    Route::get('/listeProfesseursy', function () {
        return view('Admin/list-prof');
    });
    // Route::get('/list-etudiants',function (){
    //     return view('Admin/list-etudiants');
    // });

    Route::get('/GererNiveaux',function (){
        return view('Admin/GererNiveaux');
    });
    Route::get('/Niveaux',function (){
        return view('Admin/GererNiveauxTheDiv');
    });
    Route::get('/Gérer-Niveaux/Groupes',function (){
        return view('Admin/GererGroupes');
    });
    Route::post('/etudiant-ajouter', 'EtudiantController@ajouterEtudiant');
    Route::get('/etudiant/get-details/{id}', function ($id) {
        $details = DB::table('etudiants')
            ->select('*')
            ->where('id_etudiant', '=', $id)
            ->get();
        return response()->json($details);
    });
    Route::post('/etudiant/search', [ListEtudiantController::class,'searchEt'])->name('etudiant.search');
    Route::get('/supprimer-etudiant/{id}', function ($id){

        DB::statement("EXEC supprimerEtudiant @id = ?", [$id]);
        return redirect()->back()->with('etudiantSupprimer','Étudiant supprimé avec succès');
    })->name('supprimerEtudiant');
    Route::get('/supprimer-professeur/{id}', function ($id){

        DB::statement("EXEC supprimerProf @id = ?", [$id]);
        return redirect()->back()->with('ProfSupprimer','Professeur supprimé avec succès');
    })->name('supprimerProfesseur');

    Route::get('/professeurs/get-details/{id}', function ($id) {
        $details = DB::table('professeurs')
            ->select('*')
            ->where('id_prof', '=', $id)
            ->get();
        return response()->json($details);
    });

    Route::get('/Gérer-Emploi',function (){
        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();

        return view('Admin/GererEmploi', ['listeNiveau' => $listeNiveau]);
    });
    Route::get('/matieres',[MatiereController::class,'listeMatiere']);
    Route::post('/ajouterMatiere',[MatiereController::class,'ajouterMatiere']);
    Route::get('/Emploi_Du_Temps',function (){
        return view('Admin/EmploiAGerer');
    });
    Route::get('/emploi_temps/{id_group}', 'App\Http\Controllers\GererEmploiController@index');

    /*Route::get('/Modifier_Emploi_Du_Temps',function (){
        return view('Admin/ModifierEmploi');
    });*/
    Route::get('/Modifier_Emploi_Du_Temps',function (){
        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();
        $matieres = DB::table('matieres')
            ->select('libele','id_matiere')
            ->get();

        return view('Admin/ModifierEmploi', ['listeNiveau' => $listeNiveau,'matieres'=>$matieres]);

    });

    Route::get('/AjouterUnGroupe',function (){
        $listeNiveau = DB::table('niveaux')
        ->select('*')
        ->get();
    return view('Admin/AjouterGroup', ['listeNiveau' => $listeNiveau]);

    });
    // Route::get('/list-etudiants', [ListEtudiantController::class, 'index'])->name('etudiant.ListeDesEtudiants');
    Route::get('/list-etudiants', 'App\Http\Controllers\ListEtudiantController@index');

    Route::post('/groups', 'App\Http\Controllers\AjoutGroupController@store');

    Route::get('/groups/{level_id}', 'App\Http\Controllers\AjoutGroupController@getGroupsByLevel')->name('groups');
    Route::post('/publierAnnonce',function (Request $request){

        $photoP = $request->file('img');
        $imageName = time() . '.' . $photoP->getClientOriginalExtension();
        $photoP->storeAs('public/images/annonces', $imageName);
        $example = \App\Models\annonce::create([
            'content' => $imageName,
        ]);
        return redirect(url('/notifications'))->with('success','Annonce publié avec succés');
    })->name('publierAnnonce');
    Route::get('/deleteAnnonces/{id}', function ($id){
        $annonce = annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->back()->with('successdelete', 'Annonce supprimée avec succés');
    })->name('annonces.destroy');
});

Route::get('/logout', [LoginController::class,'Logout'])->name('logout');

Route::get('/LoginPage',function (){
    return view('LoginPage');
});

Route::get('/login',function(){
    return view('LoginPage');
})->name('login');

Route::get('/mail/{email}',function ($email){
    Mail::to($email)->send(new ConfirmationInscription());
    DB::table('preinscri')->where('email_parent', $email)->delete();
    return redirect()->back()->with('mailsent','Un email d\'acceptation a ete envoye a '.$email);

});
Route::get('/refusemail/{email}',function ($email){
    DB::table('preinscri')->where('email_parent', $email)->delete();
    return redirect()->back()->with('maildelete','Vous avez rejete le demande');
});
Route::get('/motDePasseOublie',function (){
    return view('auth/passwords/reset');
})->name('motDePasseOublie');

Route::post('/photo',[HomeController::class,'photo'])->name('upload-image');

Route::get('/getlistEtudiant',[ListEtudiantController::class,'listGroup'])->name('getlistEtudiant');


/*////professeur
Route::middleware(['auth', 'user-role:professeur'])->group(function () {
    Route::get("/professeur/home", [LoginController::class, 'professeurHome'])->name('home.professeur');

});*/

////professeur
Route::middleware(['auth', 'user-role:professeur'])->group(function () {
    Route::get('/send-message', 'App\Http\Controllers\MessagerieController@sendMessage');

    Route::get('/Prossefeur/Messagerie', 'App\Http\Controllers\MessagerieController@index');

    Route::get('/compose-email', function () {
        return view('Professeur/ComposerEmail');
    });

    Route::get('/Messages/Recu', 'App\Http\Controllers\MessagerieController@showReceivedMessages');
    Route::get('/Messages/Envoyées', 'App\Http\Controllers\MessagerieController@showSentMessages');


    Route::post('/prof/changeinfos',[EtudiantController::class,'changeMotDePasse'])->name('professeur.changeMotDePasse');

    Route::get('/professeur/compte', function () {
        return view('Professeur/MonCompte');
    });
    Route::post('/profListEtudiant', [ListEtudiantController::class,'searchETProf'])->name('profListEtudiant.search');

    Route::get('/Prossefeur/Messagerie', 'App\Http\Controllers\MessagerieController@index');
    Route::post('/update-notes', [NotesController::class, 'updateNotes'])->name('update-notes');
    Route::post('/save_notes', [NotesController::class, 'saveNotes'])->name('save_notes');

    Route::get("/professeur/home", [LoginController::class, 'professeurHome'])->name('home.professeur');

    Route::get('/get-groups-by-levels/{id_niveau}', function($id_niveau) {
        $groupes = DB::table('class')
            ->join('groupe', 'groupe.id_group', '=', 'class.id_group')
            ->where('class.id_niveau', $id_niveau)
            ->select('groupe.libele', 'groupe.id_group')
            ->distinct()
            ->get();
        return response()->json($groupes);
    });

    Route::get('/List-Mes-Etudiants', function () {
        /*$etudiants = DB::table('etudiants')
            ->join('tuteur', 'etudiants.id_parent', '=', 'tuteur.CIN')
            ->select('etudiants.*', 'tuteur.nom as tuteur_nom')
            ->get();*/
        $etudiants = DB::table('etudiants as et')
            ->select(DB::raw('DISTINCT et.id_etudiant, et.nom, et.prenom, et.date_naissaince, et.telephone, et.adresse, ni.libele as nlibele, gr.libele as glibele'))
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->join('groupe as gr', 'em.id_group', '=', 'gr.id_group')
            ->join('niveaux as ni', 'em.id_niveau', '=', 'ni.id_niveau')
            ->where('em.id_prof', '=', session('id_prof'))
            ->get();

        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();
        return view('Professeur/ListEtudiantProf', [        'etudiants' => $etudiants,        'listeNiveau' => $listeNiveau    ]);
    });

    Route::get('/Prossefeur/Cours', function () {
        $cours = Cour::where('id_prof', session('id_prof'))->get();
        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();

        return view('Professeur/CoursProf',['cours'=>$cours,'listeNiveau' => $listeNiveau]);
    })->name('professeur.cours');
    Route::get('/get-cours-exercices',function (){
        $cards = Cour::all()->where('id_prof','=',session('id_prof'));
        return response()->json($cards);

    });
    Route::get('/get-exercices-cours',function (){
        $cards = Exercice::all()->where('id_prof','=',session('id_prof'));
        return response()->json($cards);

    });
    Route::post('/ajouterCoursExercices',[ProfesseurController::class,'saveExerciceCours'])->name('saveCoursExercices');
    Route::get('/Prossefeur/Emploi-du-temps', 'App\Http\Controllers\MonEmploiController@index2');
    Route::get('/Prossefeur/Notes', function () {

        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();

        $students = DB::table('notes as n')
            ->join('class as c', 'n.id_etudiant', '=', 'c.id_etudiant')
            ->join('emploi_temps as em', function($join) {
                $join->on('c.id_group', '=', 'em.id_group')
                    ->on('c.id_niveau', '=', 'em.id_niveau');
            })
            ->where('n.id_matiere', DB::raw('(select p.matiere from professeurs p where p.id_prof ='.session('id_prof').' )'))
            ->where('em.id_prof', '=',session('id_prof'))
            ->select('n.*')->distinct()
            ->get();

        return view('Professeur/ProfNotes', [  'listeNiveau' => $listeNiveau, 'students' =>$students   ]);
    });

    Route::get('/Prossefeur/Absence', function () {

        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();
        /*$students = DB::table('etudiants as e')
            ->join('notes as n', 'n.id_etudiant', '=', 'e.id_etudiant')
            ->join('class as c', 'c.id_etudiant', '=', 'e.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('em.id_group', '=', 'c.id_group')
                    ->on('em.id_niveau', '=', 'c.id_niveau')
                    ->where('em.id_prof', '=', 100);
            })
            ->where('n.id_matiere', '=', function ($query) {
                $query->select('matiere')
                    ->from('professeurs')
                    ->where('id_prof', '=', 100);
            })
            ->select('e.*')->distinct()
            ->get();*/
       /* $students = DB::table('etudiants as et')
            ->select(DB::raw('DISTINCT et.id_etudiant, et.nom, et.prenom, et.date_naissaince, et.telephone, et.adresse, ni.libele as nlibele, gr.libele as glibele'))
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->join('groupe as gr', 'em.id_group', '=', 'gr.id_group')
            ->join('niveaux as ni', 'em.id_niveau', '=', 'ni.id_niveau')
            ->where('em.id_prof', '=', session('id_prof'))
            ->get();*/
        $dayName = Carbon::now()->locale('fr_FR')->dayName;
        $day =ucfirst($dayName);
        $students = DB::table('etudiants as et')
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->where('em.jour', '=', $day)
            ->where('em.id_prof', '=', session('id_prof'))
            ->distinct('et.id_etudiant')
            ->select('et.*')
            ->get();

        return view('Professeur/ProfAbsence', [  'listeNiveau' => $listeNiveau , 'students' =>$students ]);

    });
    Route::get('/Prossefeur/Absence/{jour}/{niveau}/{groupe}', function ($jour,$niveau,$groupe){

        $etudiants = DB::table('etudiants as et')
            ->join('class as cl', 'et.id_etudiant', '=', 'cl.id_etudiant')
            ->join('emploi_temps as em', function ($join) {
                $join->on('cl.id_group', '=', 'em.id_group')
                    ->on('cl.id_niveau', '=', 'em.id_niveau');
            })
            ->where('em.jour', '=', $jour)
            ->where('em.id_niveau','=',$niveau)
            ->where('em.id_group','=',$groupe)
            ->where('em.id_prof', '=', session('id_prof'))
            ->distinct('et.id_etudiant')
            ->select('et.*')
            ->get();

        $listeNiveau = DB::table('niveaux')
            ->select('libele','id_niveau')
            ->get();
        return view('Professeur/ProfAbsence', [  'listeNiveau' => $listeNiveau ,'students' =>$etudiants   ]);

    })->name('list-absence-jour');

    Route::post('/Profeseur/save-absence',[AbsencesController::class,'store'])->name('absences.store');

    Route::get('/deleteCours/{id}', function ($id){
        $cour = Cour::findOrFail($id);
        $cour->delete();
        return redirect()->back()->with('successdelete', 'Cours  supprimé avec succés');
    })->name('cours.destroy');
    Route::get('/deleteExercice/{id}', function ($id){
        $cour = Exercice::findOrFail($id);
        $cour->delete();
        return redirect()->back()->with('successExer', 'Exercice  supprimé avec succés');
    })->name('cours.destroy');

});

