<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Organisation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class OrganisationControllerTest extends TestCase
{
    use RefreshDatabase;
    

    /** @test */
    public function it_displays_organisations_index_when_user_has_permission()
    {
        Permission::create(['name' => 'manage organisations']);
       $organisation = Organisation::factory()->create();
        $user = User::factory()->create(['organisation_id' => $organisation]);
        $user->givePermissionTo('manage organisations'); 

        $response = $this->actingAs($user)->get('/organisations');

        $response->assertStatus(200);
        $response->assertViewIs('organisations.index');
    }

    /** @test */
    public function it_displays_create_form_when_user_has_permission()
    {
        Permission::create(['name' => 'manage organisations']);
        $organisation = Organisation::factory()->create();
        $user = User::factory()->create(['organisation_id' => $organisation]);
        $user->givePermissionTo('manage organisations');

        $response = $this->actingAs($user)->get('/organisations/create');

        $response->assertStatus(200);
        $response->assertViewIs('organisations.create');
    }

   

    /** @test */
    public function it_stores_organisation_when_user_has_permission()
    {
        Permission::create(['name' => 'manage organisations']);
        $organisation = Organisation::factory()->create();
        
        // Create a user with 'manage organisations' permission
        $user = User::factory()->create(['organisation_id' => $organisation]);
        $user->givePermissionTo('manage organisations');
        $this->assertTrue(true);
         
        $response = $this->actingAs($user)->post('/organisations', [
            'name' => 'Test Organisation',
            'description' => 'Test Description',
        ]);
        

        $response->assertRedirect(route('organisations.show', Organisation::latest('id')->first()));
    }
    

    /** @test */
    public function it_displays_organisation_when_user_has_permission_or_belongs_to_organisation()
{
    $organisation = Organisation::factory()->create();
    Permission::create(['name' => 'manage organisations']);
    $user = User::factory()->create(['organisation_id' => $organisation]);
    $user->givePermissionTo('manage organisations');
    $organisation = Organisation::factory()->create();

    $response = $this->actingAs($user)->get('/organisations/' . $organisation->id);

    $response->assertStatus(200);
    $response->assertViewIs('organisations.show');
}

/** @test */
public function it_displays_edit_form_when_user_has_permission()
{
    $organisation = Organisation::factory()->create();
    Permission::create(['name' => 'manage organisations']);
    $user = User::factory()->create(['organisation_id' => $organisation]);
    $user->givePermissionTo('manage organisations');
    $organisation = Organisation::factory()->create();

    $response = $this->actingAs($user)->get('/organisations/' . $organisation->id . '/edit');

    $response->assertStatus(200);
    $response->assertViewIs('organisations.edit');
}

/** @test */
public function it_updates_organisation_and_redirects_when_user_has_permission()
{
    $organisation = Organisation::factory()->create();
    Permission::create(['name' => 'manage organisations']);
    Role::create(['name' => 'super-admin']);
    $user = User::factory()->create(['organisation_id' => $organisation]);
    $user->givePermissionTo('manage organisations');
    $user->assignRole('super-admin');
    $organisation = Organisation::factory()->create();

    $response = $this->actingAs($user)->patch('/organisations/' . $organisation->id, [
        'name' => 'Updated Organisation',
        'description' => 'Updated Description',
    ]);

    $response->assertRedirect(route('organisations.show', $organisation));
   
}

/** @test */
public function it_deletes_organisation_and_redirects_when_user_has_permission()
{
    $organisation = Organisation::factory()->create();
    Permission::create(['name' => 'delete organisations']);
    Permission::create(['name' => 'manage organisations']);
    $user = User::factory()->create(['organisation_id' => $organisation]);
    $user->givePermissionTo('delete organisations');
    $user->givePermissionTo('manage organisations');
    $organisation = Organisation::factory()->create();

    $response = $this->actingAs($user)->delete('/organisations/' . $organisation->id);

    $response->assertRedirect('/organisations');
}
}