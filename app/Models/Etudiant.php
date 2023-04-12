<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    /*protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'date_naissaince',
        'telephone',
//        'photo',
        'id_parent',
        'adresse'
    ];*/
protected $fillable=[
    'id_etudiant',
    'nom',
    'prenom',
    'sexe',
    'email',
    'date_naissaince',
    'date_adhesion',
    'telephone',
    'id_parent',
    'adresse',
    'photo'
];
    protected $hidden = [
        'motDePasse',
    ];
}
