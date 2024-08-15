<?php

namespace Tests\Feature\Admin\Roles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
// use App\Models\Permission;

class RoleViewTest extends TestCase
{
	use RefreshDatabase;

	protected $seed = true;

    /**
     * A basic feature test example.
     */
    public function test_admin_role_protected_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 3
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.show', ['role' => 1]));

        $response->assertStatus(403);
    }

    public function test_admin_role_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 3
    	]);

    	$role = Role::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.roles.show', ['role' => $role]));

        $response->assertStatus(200);
    }

    public function test_no_admin_role_protected_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 1
    	]);

        $response = $this->actingAs($user)->get(route('admin.roles.show', ['role' => 1]));

        $response->assertStatus(404);
    }

    public function test_no_admin_role_page_is_displayed(): void
    {
    	$user = User::factory()->create([
    		'role_id' => 1
    	]);

    	$role = Role::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.roles.show', ['role' => $role]));

        $response->assertStatus(404);
    }
}
