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
        Schema::table('autoformations', function (Blueprint $table) {
             $table->unsignedBigInteger('formateur_id')->nullable()->after('id');
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('autoformations', function (Blueprint $table) {
            $table->dropForeign(['formateur_id']);
            $table->dropColumn('formateur_id');
        });
    }
};
