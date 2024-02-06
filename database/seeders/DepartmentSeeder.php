<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $d = new Department();
        $d->name = "Department 1";
        $d->description = "This is the first department";
        $d->organisation()->associate(\App\Models\Organisation::find(1));
        $d->save();


    }
}
