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
        $service->name_en = 'Connect with other digital professionals';
        $service->name_cym = 'Cysylltu â phobl broffesiynol digidol eraill';
        $service->description_en = 'Our communities of practice bring people together to meet regularly, share knowledge and experience, discuss ideas and form networks to support professional development.';
        $service->description_cym = 'Mae ein cymunedau ymarfer yn dod â phobl at ei gilydd i gyfarfod yn rheolaidd, rhannu gwybodaeth a phrofiad, trafod syniadau a ffurfio rhwydweithiau i gefnogi datblygiad proffesiynol.';
        $service->organisation()->associate(\App\Models\Organisation::find(1));
        $service->department()->associate(\App\Models\Department::find(1));
        $service->save();

        $service = new \App\Models\Service();
        $service->name_en = 'Learn digital skills';
        $service->name_cym = 'Dysgu sgiliau digidol';
        $service->description_en = 'Training courses for teams and leaders who deliver public services devolved to Wales.';
        $service->description_cym = 'Cyrsiau hyfforddiant ar gyfer timau ac arweinwyr sy’n darparu gwasanaethau cyhoeddus a ddatganolwyd i Gymru.';
        $service->organisation()->associate(\App\Models\Organisation::find(1));
        $service->save();

        $service = new \App\Models\Service();
        $service->name_en = 'Service 3';
        $service->name_cym = 'Gwasanaeth 3';
        $service->description_en = 'Service 3 description';
        $service->description_cym = 'Service 3 description';
        $service->organisation()->associate(\App\Models\Organisation::find(2));
        $service->save();

        $service = new \App\Models\Service();
        $service->name_en = 'Service 4';
        $service->name_cym = 'Gwasanaeth 4';
        $service->description_en = 'Service 4 description';
        $service->description_cym = 'Service 4 description';
        $service->organisation()->associate(\App\Models\Organisation::find(2));
        $service->save();
    }
}
