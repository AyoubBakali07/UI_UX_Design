<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('apprenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('groupe_id')->constrained('groupes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('apprenants');
        Schema::dropIfExists('groupes');
    }
}; 