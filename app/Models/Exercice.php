<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'id_prof',
        'titre',
        'dateMiseEnLigne',
        'descripiton',
        'lien',
        'id_niveau',
        'id_group'
    ];
    public $timestamps = false;
}
