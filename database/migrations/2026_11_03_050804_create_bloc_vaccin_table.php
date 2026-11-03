<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bloc_vaccin', function (Blueprint $table) {
            $table->unsignedInteger('id_bloc');
            $table->unsignedInteger('id_vaccin');

            $table->foreign('id_bloc')
                ->references('id_bloc')
                ->on('blocs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_vaccin')
                ->references('id_vaccin')
                ->on('vaccins')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['id_bloc', 'id_vaccin']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bloc_vaccin');
    }
};
