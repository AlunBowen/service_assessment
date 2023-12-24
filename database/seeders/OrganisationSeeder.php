<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'CDPS';
        $organisation->description = 'The Centre for Digital Public Services';
        $organisation->save();
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'Welsh Government';
        $organisation->description = 'The Welsh Government';
        $organisation->save();
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'Cardiff Council';
        $organisation->description = 'Cardiff Council';
        $organisation->save();
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'Swansea Council';
        $organisation->description = 'Swansea Council';
        $organisation->save();
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'Neath Port Talbot Council';
        $organisation->description = 'Neath Port Talbot Council';
        $organisation->save();
        $organisation = new \App\Models\Organisation();
        $organisation->name = 'Bridgend Council';
        $organisation->description = 'Bridgend Council';
        $organisation->save();
    }
}
