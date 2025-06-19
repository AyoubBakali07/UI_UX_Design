<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('realisation_tutoriels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprenant_id')->constrained('apprenants')->onDelete('cascade');
            $table->foreignId('realisation_autoformation_id')->constrained('realisation_autoformations')->onDelete('cascade');
            $table->foreignId('tutoriel_id')->constrained('tutoriels')->onDelete('cascade');
            $table->enum('etat', ['Non commencé', 'En cours', 'Terminé', 'Abandonné']);
            $table->string('github_link')->nullable();
            // $table->string('project_link')->nullable();
            // $table->string('slide_link')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('realisation_tutoriels');
    }
}; 