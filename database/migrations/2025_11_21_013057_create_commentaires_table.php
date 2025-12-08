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
    Schema::create('commentaires', function (Blueprint $table) {
        $table->id('id_commentaire');
        $table->text('texte');
        $table->integer('note');
        $table->date('date');

        $table->unsignedBigInteger('id_utilisateur');
        $table->unsignedBigInteger('id_contenu');

        $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs');
        $table->foreign('id_contenu')->references('id_contenu')->on('contenus')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('commentaires');
}

};
