<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
class ResourceControllerTest extends TestCase
{
   use DatabaseMigrations;

   /** @test */
    public function getResources()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/resources');

        $response->assertStatus(200);
    }

    /** @test */
    public function getCuratedResources()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/resources/1/1');

        $response->assertStatus(200);
        
        $response->assertJsonIsArray();
    }
}
