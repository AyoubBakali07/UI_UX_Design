<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('competence_id')->constrained('competences')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('technologies');
        Schema::dropIfExists('competences');
    }
}; 