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

            $table->unsignedBigInteger('reservation_id'); // Référence au locataire
            $table->unsignedBigInteger('modele');
            $table->text('contenu'); // Contrat généré avec les variables remplies
            $table->float('prixParMois')->default(0); // Prix total du contrat
            $table->timestamps();

            // Clés étrangères
            $table->foreign('modele')->references('id')->on('contract_templates')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reserver_boxes')->onDelete('cascade');

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
