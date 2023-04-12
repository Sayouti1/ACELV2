<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->string('id',20);
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('dateNaissance');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('niveau');
            $table->string('groupe');
            $table->date('dateEntree')->default(date('Y-m-d'));
            $table->string('motDePasse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
