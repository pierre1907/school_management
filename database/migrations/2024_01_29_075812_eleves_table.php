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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nomComplet');
            $table->string('genre');
            $table->string('nationalite');
            $table->string('lieu_naissance');
            $table->date('date_naissance');
            $table->string('niveau');
            //$table->string('classe');
            $table->string('photo');
            $table->timestamps();
        });
    }
    // $eleve = new Eleve();
    // $eleve->nom = $request->input('nom');
    // $eleve->genre = $request->input('genre');
    // $eleve->date_naissance = $request->input('date_naissance');
    // $eleve->lieu_naissance = $request->input('lieu_naissance');
    // $eleve->nationalite = $request->input('nationalite');
    // $eleve->classe = $request->input('classe');
    // $eleve->niveau = $request->input('niveau');
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
};
