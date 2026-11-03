<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('id_role');
            $table->unsignedInteger('id_user');

            $table->foreign('id_role')
                ->references('id_role')
                ->on('roles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_user')
                ->references('id_user')
                ->on('user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['id_role', 'id_user']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
