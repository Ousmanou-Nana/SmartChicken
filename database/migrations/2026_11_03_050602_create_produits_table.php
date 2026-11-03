<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id_produit');
            $table->string('label_produit');
            $table->text('description_produit');
            $table->string('type_produit');
            $table->integer('quantite_produit');
            $table->decimal('prix_produit', 12, 2);

            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_bloc');

            $table->foreign('id_user')
                ->references('id_user')
                ->on('user')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_bloc')
                ->references('id_bloc')
                ->on('blocs')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
