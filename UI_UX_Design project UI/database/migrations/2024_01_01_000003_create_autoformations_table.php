<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tutoriels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('autoformations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('tutoriel_id')->constrained('tutoriels')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('autoformation_technologie', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('autoformation_id')->constrained('autoformations')->onDelete('cascade');
            $table->foreignId('technologie_id')->constrained('technologies')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('autoformation_technologie');
        Schema::dropIfExists('autoformations');
        Schema::dropIfExists('tutoriels');
    }
}; 