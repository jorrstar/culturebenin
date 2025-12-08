<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilisateur_id'); // ✅ CORRIGÉ
            $table->string('plan'); // monthly, yearly
            $table->decimal('amount', 10, 2); // 2.00 pour 2$
            $table->string('currency')->default('USD');
            $table->string('fedapay_transaction_id')->nullable();
            $table->string('status')->default('pending'); // pending, active, cancelled, expired
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            // ✅ CORRIGÉ : Référence à id_utilisateur
            $table->foreign('utilisateur_id')
                  ->references('id_utilisateur')
                  ->on('utilisateurs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};