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
        Schema::create('realisations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprenant_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'abandoned'])->default('not_started');
            $table->text('commentaire')->nullable();
            $table->unsignedBigInteger('autoformation_id')->nullable();
            $table->unsignedBigInteger('tuto_id')->nullable();

            $table->foreign('autoformation_id')->references('id')->on('autoformations')->onDelete('cascade');
            $table->foreign('tuto_id')->references('id')->on('tutos')->onDelete('cascade');

            $table->timestamps();
        });         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisations');
    }
};
