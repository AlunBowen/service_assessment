<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;

class AnswerTest extends TestCase
{

    use DatabaseMigrations;


   /** @test */
    public function store()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->post('/api/answer/1/1/1/1/Yes');

        $response->assertStatus(200);
    }

    /** @test */
    public function getAnswersForAssessment()
    {
        
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/answers/1/1/1');

        $response->assertStatus(200);
        
        $response->assertJsonIsArray();
    }

    /** @test */
    public function calculateWorsePerformingSection(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/answer/results/1/1');

        $response->assertStatus(200);
        
        $response->assertJsonIsArray();
    }

    /** @test */
    public function completionRate(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/results/1/1');

        $response->assertStatus(200);
        
    }
    
    /** @test */
    public function getAllAnswers(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/answers/1/1');

        $response->assertStatus(200);
        
        $response->assertJsonIsObject();
    }
    /** @test */
    public function getTimeBasedResults(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/answersTime/1/1');

        $response->assertStatus(200);
        
        $response->assertJsonIsObject();
        
        $response->assertJsonStructure([
            'must',
            'should',
            'could'
        ]);
    }

    /** @test */
    public function getDateOfLastAnswer(){

        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/results/lastupdate/1/1');

        $response->assertStatus(200);
        
  
    }

    /** @test */
    public function howManyService(){
            
            //seed the database
            $this->seed(DatabaseSeeder::class);
    
            //find user 
            $user = User::find(1);
            $this->assertDatabaseHas('users', ['id' => 1]);
    
            $response = $this->actingAs($user)->get('/api/results/countofservices/1');
    
            $response->assertStatus(200);
            
            
    }
}
