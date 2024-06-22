<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;

class QuestionControllerTest extends TestCase
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

        $response = $this->actingAs($user)->post('/api/question', [
            'question_en' => 'Test Question',
            'question_cym' => 'Cymraeg',
            'level' => 1,
            'assessment_section_id' => 1,
            'assessment_id' => 1
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function update()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->patch('/api/question/1', [
            'question_en' => 'Test Question',
            'question_cym' => 'Cymraeg',
            'level' => 1,
            'assessment_section_id' => 1,
            'assessment_id' => 1
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function destroy()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->delete('/api/question/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function getQuestionsForSection()
    {
        //seed the database
        $this->seed(DatabaseSeeder::class);

        //find user 
        $user = User::find(1);
        $this->assertDatabaseHas('users', ['id' => 1]);

        $response = $this->actingAs($user)->get('/api/question/1');

        $response->assertStatus(200);
    }


}
