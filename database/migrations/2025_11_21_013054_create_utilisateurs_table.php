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
    Schema::create('utilisateurs', function (Blueprint $table) {
        $table->id('id_utilisateur');
        $table->string('nom', 20);
        $table->string('email', 30)->unique();
        $table->string('mot_de_passe', 255);
        $table->string('prenom', 10);
        $table->char('sexe', 1);
        $table->date('date_inscription');
        $table->date('date_naissance');
        $table->string('statut', 10);
        $table->string('photo', 255);

        // Foreign keys
        $table->unsignedBigInteger('id_role')->nullable();
        $table->unsignedBigInteger('id_langue')->nullable();

        $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('set null');
        $table->foreign('id_langue')->references('id_langue')->on('langues')->onDelete('set null');

        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
