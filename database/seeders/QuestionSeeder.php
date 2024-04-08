<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Question();
        $a->question_en = "Do you use agile methodologies?";
        $a->question_cym = "Ydych chin defnyddion agile?";
        $a->level = 1;
        $a->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
        $a->save();
        $a = new Question();
        $a->question_en = "Multi diciplinary team?";
        $a->question_cym = "Beth yw eich oed?";
        $a->level = 2;
        $a->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
        $a->save();
    }

}
