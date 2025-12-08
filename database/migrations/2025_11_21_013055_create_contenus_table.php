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
    Schema::create('contenus', function (Blueprint $table) {
        $table->id('id_contenu');

        $table->string('titre', 70);
        $table->string('texte', 100)->nullable();
        $table->date('date_creation');
        $table->string('statut', 20);
        $table->unsignedBigInteger('parent_id')->nullable();
        $table->date('date_validation')->nullable();

        $table->unsignedBigInteger('id_region');
        $table->unsignedBigInteger('id_langue');
        $table->unsignedBigInteger('id_moderateur');
        $table->unsignedBigInteger('id_type_contenu');
        $table->unsignedBigInteger('id_auteur');

        // Foreign keys correctes
        $table->foreign('id_region')->references('id_region')->on('regions');
        $table->foreign('id_langue')->references('id_langue')->on('langues');
        $table->foreign('id_moderateur')->references('id_utilisateur')->on('utilisateurs');
        $table->foreign('id_type_contenu')->references('id_type_contenu')->on('type_contenus');
        $table->foreign('id_auteur')->references('id_utilisateur')->on('utilisateurs');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('contenus');
}

};
