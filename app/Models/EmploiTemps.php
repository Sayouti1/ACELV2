<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploiTemps extends Model
{
    protected $table = 'emploi_temps';

    protected $fillable = [
        'jour',
        'id_matiere',
        'seance',
        'id_group',
    ];
}
