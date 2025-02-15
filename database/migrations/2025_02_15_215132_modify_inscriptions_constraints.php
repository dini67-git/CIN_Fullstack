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
        Schema::table('inscriptions', function (Blueprint $table) {
            // Suppression de l'unicité sur le téléphone
            $table->dropUnique(['telephone']);
            // Suppression de l'unicité sur l'email
            $table->dropUnique(['email']);
        });

        // Ajout d'une contrainte d'unicité composite sur email et formation_id
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->unique(['email', 'formation_id'], 'unique_email_formation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            // Rétablir l'unicité sur l'email
            $table->unique('email');
            // Rétablir l'unicité sur le téléphone
            $table->unique('telephone');
        });

        // Supprimer la contrainte d'unicité composite si nécessaire
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropUnique('unique_email_formation');
        });
    }
};
