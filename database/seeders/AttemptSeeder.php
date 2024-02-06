<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attempt;

class AttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Attempt();
        $a->name_en = "Attempt 1";
        $a->name_cym = "Cais 1";
        $a->description_en = "This is the first attempt";
        $a->description_cym = "Dyma cais cyntaf";
        $a->assessment()->associate(\App\Models\Assessment::find(1));
        $a->service()->associate(\App\Models\Service::find(1));
        $a->save();
        $a = new Attempt();
        $a->name_en = "Attempt 2";
        $a->name_cym = "Cais 2";
        $a->description_en = "This is the second attempt";
        $a->description_cym = "Dyma ail gais";
        $a->assessment()->associate(\App\Models\Assessment::find(2));
        $a->service()->associate(\App\Models\Service::find(2));
        $a->save();

    }
}
