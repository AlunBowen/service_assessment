<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Assessment();
        $a->name_en = "Digital Service Standards Assessment";
        $a->name_cym = "Asesiad Safonau Gwasanaeth Digidol";
        $a->description_en = "This is the first assessment";
        $a->description_cym = "Dyma asesun cyntaf";
     
        $a->save();
        $a = new Assessment();
        $a->name_en = "Assessment 2";
        $a->name_cym = "Asesun 2";
        $a->description_en = "This is the first assessment";
        $a->description_cym = "Dyma asesun cyntaf";
       
        $a->save();
       
    }
}
