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
        Schema::table('apprenant_autoformation', function (Blueprint $table) {
            $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apprenant_autoformation', function (Blueprint $table) {
            $table->dropColumn(['status', 'date_debut', 'date_fin']);
        });
    }
};
