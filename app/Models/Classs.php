<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $table = 'class';

    protected $fillable = [
        'id_etudiant',
        'id_group',
        'id_niveau',
    ];
}
