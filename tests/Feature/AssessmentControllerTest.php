<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Assessment;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Organisation;
use Database\Seeders\DatabaseSeeder;
use Dflydev\DotAccessData\Data;

class AssessmentControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */

    public function view_all_assessments()
    {


        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);

        $response = $this->actingAs($user)->get('/assessments');

        $response->assertStatus(200);
        $response->assertViewIs('assessments.index');
    }


    /** @test */
    // public function create_assessment()
    // {

    //     Permission::create(['name' => 'create assessment']);

    //     $organisation = Organisation::factory()->create();
    //     $user = User::factory()->create(['organisation_id' => $organisation]);
    //     $user->givePermissionTo('create assessment');

    //     $response = $this->actingAs($user)->get('/assessments/create', [
    //         'name_en' => 'Test Assessment',
    //         'name_cym' => 'Asesiad Test',
    //         'description_en' => 'This is a test assessment',
    //         'description_cym' => 'Dyma asesiad prawf',
    //     ]);

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function show_assessment()
    {

        $this->seed(DatabaseSeeder::class);

        $user = User::find(1);

        $response = $this->actingAs($user)->get('/assessments/1');

        $response->assertStatus(200);
        $response->assertViewIs('assessments.show');
    }
}
