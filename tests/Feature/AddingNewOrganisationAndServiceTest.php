<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use App\Models\Organisation;



class AddingNewOrganisationAndServiceTest extends TestCase
{
    
    use DatabaseMigrations;

    
    

    // /** @test */
    // public function createOrganisation1()
    // {   

    //     //seed the database
    //     $this->seed(DatabaseSeeder::class);

    //     //find user 
    //     $user = User::find(1);


    //     // Create a new organisation
    //     $response = $this->actingAs($user)->post('/organisations', [
    //         'name' => 'Test Organisation',
    //         'description' => 'Test Description',
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect(route('organisations.show', Organisation::latest('id')->first()));
        
      
    //     // Create a new service
    //     $response = $this->actingAs($user)->post('/services', [
    //         'name' => 'Test Service',
    //         'description' => 'Test Description',
    //         'organisation_id' => Organisation::latest('id')->first()->id,
    //     ]);
    //     $response->assertStatus(302);
        

    // }

    
}

