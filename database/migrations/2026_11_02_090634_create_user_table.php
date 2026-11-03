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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nom_user',128);
            $table->string('prenom_user',128)->nullable();
             $table->string('email_user',50)->unique();
            $table->string('phone_user',12);
            $table->enum('sexe',['M','F'])->default('F');
            $table->string("login_user",50)->unique();
            $table->string("password_user",255);
            $table->enum("statut_user",["ACTIF","SUSPENDU"])->default("ACTIF");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
