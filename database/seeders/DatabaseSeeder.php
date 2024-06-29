<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      


        $manageAssessments = Permission::create(['name' => 'manage assessments']);
        $manageUsers= Permission::create(['name' => 'manage users']);
        $viewAllResults = Permission::create(['name' => 'view all results']);
        $manageOrganisations= Permission::create(['name' => 'manage organisations']);
        $deleteOrganisations= Permission::create(['name' => 'delete organisations']);
        $completeAssessments= Permission::create(['name' => 'complete assessments']);

        //Super admin
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());
       
        //CDPS admin
        $cdpsAdmin = Role::create(['name'=> 'cdps-admin']);
        $cdpsAdmin->givePermissionTo($manageAssessments);
        $cdpsAdmin->givePermissionTo($manageUsers);
        $cdpsAdmin->givePermissionTo($manageOrganisations);

        //CDPS staff
        $cdpsStaff = Role::create(['name'=> 'cdps-staff']);
        $cdpsStaff->givePermissionTo($viewAllResults); 
        $cdpsStaff->givePermissionTo($completeAssessments);    
        
        //Organisation admin
        $orgAdmin = Role::create(['name'=> 'org-admin']);
        $orgAdmin->givePermissionTo($completeAssessments);

        //Organisation staff
        $orgStaff = Role::create(['name'=> 'org-staff']);
        $orgStaff->givePermissionTo($completeAssessments);

       
        
        $this->call(OrganisationSeeder::class);
        $this->call(UsersSeeder::class);
        // $this->call(DepartmentSeeder::class);
        $this->call(ServiceSeeder::class);
       
        $this->call(AssessmentSeeder::class);
        $this->call(AssessmentSectionSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AttemptSeeder::class);
        $this->call(AnswersSeeder::class);
        $this->call(ResourceSeeder::class);
    }
}
