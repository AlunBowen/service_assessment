<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
class ServiceControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function index()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/services');

        $response->assertStatus(200);
    }

    /** @test */
    public function create()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/services/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function store()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->post('/services', [
            'name' => 'Test Service',
            'description' => 'This is a test service',
            'organisation_id' => 1
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function show()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);
    }


    /** @test */
    public function getServices(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/services');

        $response->assertStatus(200);
        
        $response->assertJsonIsArray();
    }

    /** @test */
    public function answerSection(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->post('/api/answer/1/1/1/1/Yes');

        $response->assertStatus(200);
    }
}
