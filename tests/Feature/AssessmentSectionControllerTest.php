<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;


class AssessmentSectionControllerTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function store_assessment_section()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);


        $response = $this->actingAs($user)->post('/api/assessmentsection', [
            'name_en' => 'Test Assessment Section',
            'name_cym' => 'Adran Asesiad Test',
            'description_en' => 'This is a test assessment section',
            'description_cym' => 'Dyma adran asesiad prawf',
            'assessment_id' => 1
        ]);

        $response->assertJson([
            'name_en' => 'Test Assessment Section',
            'name_cym' => 'Adran Asesiad Test',
            'description_en' => 'This is a test assessment section',
            'description_cym' => 'Dyma adran asesiad prawf',
            'assessment_id' => 1
        ]);
    }
}
