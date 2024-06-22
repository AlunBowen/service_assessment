<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use App\Models\AssessmentSection;
use App\Models\Assessment;

class AssessmentSectionControllerTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function store()
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

    /** @test */
    public function destroy()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);

        //create a new assessment section
        $assessmentSection = new AssessmentSection();
        $assessmentSection->name_en = 'Test Assessment Section';
        $assessmentSection->name_cym = 'Adran Asesiad Test';
        $assessmentSection->description_en = 'This is a test assessment section';
        $assessmentSection->description_cym = 'Dyma adran asesiad prawf';
        $assessmentSection->assessment()->associate(Assessment::find(1));
        $assessmentSection->save();

        $response = $this->actingAs($user)->delete('/api/assessmentsection/3');

        $response->assertJson([
            'id' => 3
        ]);
    }

    /** @test */
    public function getAssessmentSections()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);

        $response = $this->actingAs($user)->get('/api/assessmentsection/1');

        $response->assertJsonStructure([
            '*' => [
                'id',
                'name_en',
                'name_cym',
                'description_en',
                'description_cym',
                'assessment_id'
            ]
        ]);
    }
}
