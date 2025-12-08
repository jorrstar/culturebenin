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
    Schema::table('utilisateurs', function (Blueprint $table) {
        $table->string('provider_name')->nullable()->after('photo');
        $table->string('provider_id')->nullable()->after('provider_name');
        $table->timestamp('email_verified_at')->nullable()->after('mot_de_passe'); // optionnel mais pratique
    });
}

public function down()
{
    Schema::table('utilisateurs', function (Blueprint $table) {
        $table->dropColumn(['provider_name', 'provider_id', 'email_verified_at']);
    });
}

};
