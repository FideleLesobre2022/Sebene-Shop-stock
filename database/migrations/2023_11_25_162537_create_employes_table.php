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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('prenom_employe');
            $table->string('nom_employe');
            $table->string('adresse_employe');
            $table->integer('codepostal_employe');
            $table->string('ville_employe');
            $table->string('telephone_employe');
            $table->string('poste_employe');
            $table->integer('salaire_employe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
