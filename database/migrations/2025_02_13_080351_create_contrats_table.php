<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proprietaire_id'); // Référence au propriétaire
            $table->unsignedBigInteger('locataire_id'); // Référence au locataire
            $table->unsignedBigInteger('box_id'); // Référence au box loué
            $table->string('modele'); // Nom du modèle utilisé
            $table->text('contenu'); // Contrat généré avec les variables remplies
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('cascade');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
