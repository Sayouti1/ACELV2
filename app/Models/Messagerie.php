<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{
    protected $table = 'messagerie';

    public $timestamps = false;

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_mail', 'email');
    }

    public function target()
    {
        return $this->belongsTo(User::class, 'target_mail', 'email');
    }
}
