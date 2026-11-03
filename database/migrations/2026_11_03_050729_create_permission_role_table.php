<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('id_permission');
            $table->unsignedInteger('id_role');

            $table->foreign('id_permission')
                ->references('id_permission')
                ->on('permissions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_role')
                ->references('id_role')
                ->on('roles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['id_permission', 'id_role']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};
