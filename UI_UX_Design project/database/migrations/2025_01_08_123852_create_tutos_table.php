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
        Schema::create('tutos', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('contenu');
            $table->integer('order');
            $table->string('progression')->default('En cours'); // Example values: En cours, Terminée, etc.
            $table->unsignedBigInteger('formation_id')->nullable()->constrained()->cascadeOnDelete();

            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade'); // Assuming 'formations' table has an 'id' column for foreign key reference.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutos');
    }
};
