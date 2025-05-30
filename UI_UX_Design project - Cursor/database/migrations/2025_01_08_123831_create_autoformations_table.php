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
        Schema::create('autoformations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');    
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('niveau', ['debutant', 'intermediaire', 'avance']);
            $table->integer('duree');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoformations');
    }
};
