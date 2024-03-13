<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new \App\Models\Service();
        $service->name = 'Connect with other digital professionals';
        $service->description = 'Our communities of practice bring people together to meet regularly, share knowledge and experience, discuss ideas and form networks to support professional development.';
        $service->organisation()->associate(\App\Models\Organisation::find(1));
        $service->department()->associate(\App\Models\Department::find(1));
        $service->save();

        $service = new \App\Models\Service();
        $service->name = 'Learn digital skills';
        $service->description = 'Training courses for teams and leaders who deliver public services devolved to Wales.';
        $service->organisation()->associate(\App\Models\Organisation::find(1));
        $service->save();

        $service = new \App\Models\Service();
        $service->name = 'Service 3';
        $service->description = 'Service 3 description';
        $service->organisation()->associate(\App\Models\Organisation::find(2));
        $service->save();

        $service = new \App\Models\Service();
        $service->name = 'Service 4';
        $service->description = 'Service 4 description';
        $service->organisation()->associate(\App\Models\Organisation::find(2));
        $service->save();
    }
}
