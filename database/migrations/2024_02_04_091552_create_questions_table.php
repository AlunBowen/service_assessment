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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('question_en');
            $table->string('question_cym');
            $table->bigInteger('level');
            $table->unsignedBigInteger('assessment_section_id');
            $table->foreign('assessment_section_id')->references('id')->on('assessment_sections');
            $table->unsignedBigInteger('assessment_id')->default(0);
            $table->foreign('assessment_id')->references('id')->on('assessments');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
