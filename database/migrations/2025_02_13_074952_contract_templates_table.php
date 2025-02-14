<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('contract_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Propriétaire du modèle (admin ou propriétaire de box)
            $table->string('name'); // Nom du modèle
            $table->json('content'); // Contenu du modèle (avec les variables)
            $table->timestamps();

            // Clé étrangère pour l'utilisateur qui crée le modèle
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_templates');
    }
};
