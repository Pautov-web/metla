<?php

namespace Tests\Feature\Admin\Roles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
// use App\Models\Permission;

class RoleViewAnyTest extends TestCase
{
	use RefreshDatabase;

	protected $seed = true;

    /**
     * Test roles list.
     * @test
     */
    public function test_admin_roles_page_is_displayed(): void
    {

    	$user = User::factory()->create([
    		'role_id' => 3
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.index'));

        $response->assertStatus(200);
    }

    public function test_cleaner_roles_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 2
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.index'));

        $response->assertStatus(404);
    }

    public function test_client_roles_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 1
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.index'));

        $response->assertStatus(404);
    }

    public function test_without_perms_roles_page_is_displayed(): void
    {
    	$role = Role::factory()
    			->create();

    	$user = User::factory()->create([
    		'role_id' => $role->id,
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.index'));

        $response->assertStatus(404);
    }
}
