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
            $table->unsignedBigInteger('formateur_id')->nullable();
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('tutoriels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('contenu')->nullable();
            $table->integer('ordre')->nullable();
            $table->string('course_link')->nullable();
            $table->foreignId('autoformation_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('autoformation_technologie');
        Schema::dropIfExists('tutoriels');
        Schema::dropIfExists('autoformations');
    }
}; 