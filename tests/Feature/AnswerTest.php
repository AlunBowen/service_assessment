<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
   /** @test */
    public function store_test()
    {
        //seed the database
        $this->seed();
        $response = $this->post('/answers', [
            'assessment' => 1,
            'service' => 1,
            'section' => 1,
            'question' => 1,
            'answer' => 'Yes',
        ]);

        $response->assertStatus(200);
    }
}
