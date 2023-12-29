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
        Schema::create('multi_choice_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('question_en');
            $table->string('question_cym');
            $table->string('answer1_en');
            $table->string('answer1_cym');
            $table->string('answer2_en');
            $table->string('answer2_cym');
            $table->string('answer3_en');
            $table->string('answer3_cym');
            $table->string('answer4_en');
            $table->string('answer4_cym');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_choice_questions');
    }
};
