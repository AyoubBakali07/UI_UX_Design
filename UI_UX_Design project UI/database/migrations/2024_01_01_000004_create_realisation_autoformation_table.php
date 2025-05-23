<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('realisation_autoformations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprenant_id')->constrained('apprenants')->onDelete('cascade');
            $table->foreignId('autoformation_id')->constrained('autoformations')->onDelete('cascade');
            $table->enum('status', ['encours', 'termine', 'abandonne']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('realisation_autoformations');
    }
}; 