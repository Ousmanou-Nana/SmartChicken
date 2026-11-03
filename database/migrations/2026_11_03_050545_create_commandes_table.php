<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id_commande');
            $table->dateTime('date_commande');
            $table->unsignedBigInteger('total_commande');
            $table->enum('statut_commande',['EN_COURS','LIVREE','ANNULEE'])->default('EN_COURS');


            $table->unsignedInteger('id_user');
            $table->foreign('id_user')
                ->references('id_user')
                ->on('user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
