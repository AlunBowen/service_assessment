<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r = new \App\Models\Resource();
        $r->name_en = 'Resource 1 level 1 section 1';
        $r->name_cym = 'Adnodd 1 lefel 1 adran 1';

        $r->description_en = 'Resource 1 description';
        $r->description_cym = 'Disgrifiad adnodd 1';
        $r->level = 1;
        $r->section = 1;
        $r->url = 'https://www.google.com';
        $r->save();

        $r = new \App\Models\Resource();
        $r->name_en = 'Resource 2 level 2 section 1';
        $r->name_cym = 'Adnodd 2 lefel 1 adran 1';

        $r->description_en = 'Resource 2 description';
        $r->description_cym = 'Disgrifiad adnodd 2';
        $r->level = 2;
        $r->section = 1;
        $r->url = 'https://www.google.com';
        $r->save();

        $r = new \App\Models\Resource();
        $r->name_en = 'Resource 3 level 3 section 1';
        $r->name_cym = 'Adnodd 3 lefel 3 adran 1';
        
        $r->description_en = 'Resource 3 description';
        $r->description_cym = 'Disgrifiad adnodd 3';
        $r->level = 3;
        $r->section = 1;
        $r->url = 'https://www.google.com';
        $r->save();
        
        $r = new \App\Models\Resource();
        $r->name_en = 'Design Resource 4 level 1 section 2';
        $r->name_cym = 'Design Adnodd 4 lefel 1 adran 2';
        $r->description_en = 'Resource 4 description';
        $r->description_cym = 'Disgrifiad adnodd 4';
        $r->level = 1;
        $r->section = 2;
        $r->url = 'https://www.google.com';
        $r->save();

        $r = new \App\Models\Resource();
        $r->name_en = 'Design Resource 5 level 2 section 2';
        $r->name_cym = 'Design Adnodd 5 lefel 2 adran 2';
        $r->description_en = 'Resource 5 description';
        $r->description_cym = 'Disgrifiad adnodd 5';
        $r->level = 2;
        $r->section = 2;
        $r->url = 'https://www.google.com';
        $r->save();

        $r = new \App\Models\Resource();
        $r->name_en = 'Design Resource 6 level 3 section 2';
        $r->name_cym = 'Design Adnodd 6 lefel 3 adran 2';
        $r->description_en = 'Resource 6 description';
        $r->description_cym = 'Disgrifiad adnodd 6';
        $r->level = 3;
        $r->section = 2;
        $r->url = 'https://www.google.com';
        $r->save();


        

    }
}
