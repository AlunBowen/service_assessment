<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSection;


class AssessmentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new AssessmentSection();
        $a->name_en = "Leadership";
        $a->name_cym = "Arweinyddiaeth";
        $a->description_en = "This is the first assessment section";
        $a->description_cym = "Dyma gyntaf asesiad adran";
        $a->assessment()->associate(\App\Models\Assessment::find(1));
        $a->save();

        $a = new AssessmentSection();
        $a->name_en = "Design";
        $a->name_cym = "Dylunio";
        $a->description_en = "This is the second assessment section";
        $a->description_cym = "Dyma ail asesiad adran";
        $a->assessment()->associate(\App\Models\Assessment::find(1));
        $a->save();
    }
}
