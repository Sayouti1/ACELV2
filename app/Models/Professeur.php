<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class Professeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'date_adhesion',
        'telephone',
        'adresse',
        'ville',
        'wallet',
        'sallaire',
        'diplome',
        'zip',
        'cin',
        'matiere',
        'dateNaissance',

    ];
    public $timestamps = false;
    /*protected $hidden = [
        'motDePasse',
    ];*/
    public function AjouterProfesseur(  $nom,$prenom,$sexe,$email,$telephone,$dateNaissance,$date_adhesion,$diplome,$sallaire,$CIN,$matiere,$adresse,$ville,$zip,$password,$wallet) {
        try {
            $encryptedpassword=bcrypt($password);
            $results = DB::select('EXEC AjouterProfesseur ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', array(  $nom,$prenom,$sexe,$email,$date_adhesion,$telephone,$adresse,$ville,$dateNaissance,$diplome,$sallaire,$CIN,$matiere,$zip,$encryptedpassword,$wallet));
            return $results;
        } catch (QueryException $e) {
            // handle exception
        }
    }

}
