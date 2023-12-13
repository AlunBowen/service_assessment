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
        $service->name = 'Service 1';
        $service->description = 'Service 1 description';
        $service->organisation()->associate(\App\Models\Organisation::find(1));
        $service->save();

        $service = new \App\Models\Service();
        $service->name = 'Service 2';
        $service->description = 'Service 2 description';
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
