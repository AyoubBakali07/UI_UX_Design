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
            $table->enum('etat', ['encours', 'termine', 'abandonne']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('realisation_tutoriels');
    }
}; 