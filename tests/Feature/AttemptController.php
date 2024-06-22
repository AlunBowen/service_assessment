<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;



class AttemptController extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function index()
    {

        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $response = $this->get('/attempt');

        $response->assertStatus(200);
    }

    /** @test */
    public function create()
    {
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $response = $this->get('/attempt/create');

        $response->assertStatus(200);
    }   

    /** @test */
    public function store()
    {
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $response = $this->post('/attempt', [
            'name' => 'Test Attempt',
            'description' => 'This is a test attempt',
            'user_id' => 1
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function show()
    {
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $response = $this->get('/attempt/1');

        $response->assertStatus(200);
    }

}
