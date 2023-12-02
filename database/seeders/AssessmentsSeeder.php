<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Assessment();
        $a->name_en = "Assessment 1";
        $a->name_cym = "Asesun 1";
        $a->description_en = "This is the first assessment";
        $a->description_cym = "Dyma asesun cyntaf";
        $a->save();
    }
}
