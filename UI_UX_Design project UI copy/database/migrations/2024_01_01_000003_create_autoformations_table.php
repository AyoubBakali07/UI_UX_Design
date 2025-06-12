<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('autoformations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('tutoriels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('contenu')->nullable();
            $table->integer('ordre')->nullable();
            $table->foreignId('autoformation_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('autoformation_technologie', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('autoformation_id')->constrained('autoformations')->onDelete('cascade');
            $table->foreignId('technologie_id')->constrained('technologies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('autoformation_technologie');
        Schema::dropIfExists('tutoriels');
        Schema::dropIfExists('autoformations');
    }
}; 