<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

use Carbon\Carbon;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $a = new Answer();
        // $a->answer = "Yes";
        // $a->question()->associate(\App\Models\Question::find(1));
        // $a->assessment()->associate(\App\Models\Assessment::find(1));
        // $a->service()->associate(\App\Models\Service::find(1));
        // $a->section()->associate(\App\Models\AssessmentSection::find(1));
        // $a->user()->associate(\App\Models\User::find(1));
        // $a->save();
        // $a = new Answer();
        // $a->answer = "No";
        // $a->question()->associate(\App\Models\Question::find(2));
        // $a->assessment()->associate(\App\Models\Assessment::find(1));
        // $a->service()->associate(\App\Models\Service::find(1));
        // $a->section()->associate(\App\Models\AssessmentSection::find(1));
        // $a->user()->associate(\App\Models\User::find(1));
        // $a->save();
        // $a = new Answer();
        // $a->answer = "Yes";
        // $a->question()->associate(\App\Models\Question::find(3));
        // $a->assessment()->associate(\App\Models\Assessment::find(1));
        // //created at
        // $a->created_at = '2021-09-01';
        // $a->service()->associate(\App\Models\Service::find(1));
        // $a->section()->associate(\App\Models\AssessmentSection::find(1));
        // $a->user()->associate(\App\Models\User::find(1));
        // $a->save();

        $date = Carbon::now();
        for ($i=9; $i >= 1; $i--) {
            $a = new Answer();
            $a->answer = "Yes";
            $a->question()->associate(\App\Models\Question::find($i));
            $a->assessment()->associate(\App\Models\Assessment::find(1));
            $a->created_at = $date;
            $a->service()->associate(\App\Models\Service::find(1));
            $a->section()->associate(\App\Models\AssessmentSection::find(1));
            $a->user()->associate(\App\Models\User::find(1));
            $a->save();
            $date->subMonth();
        };  
        


    }
}
