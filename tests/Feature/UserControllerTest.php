<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Organisation;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function store()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);
        $response= $this->actingAs($user)->post('/users', [
            'name' => 'Test User',
            'email' => 'email@email.co.uk',
            'password' => 'Pass123!',
            'password_confirmation' => 'Pass123!',

            'organisation_id' => 2,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['email' => 'email@email.co.uk']);


    }

    /** @test */
    public function testApiIndex()
    {
        $this->seed(DatabaseSeeder::class);
        $organisation = Organisation::find(1);
        $user = User::find(1);

        $response = $this->get('/api/organisationusers/' . $organisation->id);

        $response->assertStatus(200);
        $response->assertJson([$user->toArray()]);
    }
    
} 