<?php

namespace Tests\Feature\Admin\Roles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RoleCreateTest extends TestCase
{

	use RefreshDatabase;

	// protected $seed = true;
	
    /**
     * A basic feature test example.
     */
    // public function test_admin_create_role(): void
    // {
    // 	$user = User::factory()->create([
    // 		'role_id' => 3
    // 	]);

    //     $response = $this->actingAs($user)->get(route('admin.roles.create'));

    //     $response->assertStatus(200);
    // }

    // public function test_no_admin_create_role(): void
    // {
    // 	$user = User::factory()->create([
    // 		'role_id' => 2
    // 	]);

    //     $response = $this->actingAs($user)->get(route('admin.roles.create'));

    //     $response->assertStatus(404);
    // }

    // public function test_admin_store_role(): void
    // {
    // 	$user = User::factory()->create([
    // 		'role_id' => 3
    // 	]);

    //     $response = $this->actingAs($user)->post(route('admin.roles.store'), [
    //     	'name' => fake()->name(),
    //     	'permissions' => [1],
    //     ]);

    //     $response->assertStatus(200);
    // }

    // public function test_no_admin_store_role(): void
    // {
    // 	$user = User::factory()->create([
    // 		'role_id' => 2
    // 	]);

    //     $response = $this->actingAs($user)->post(route('admin.roles.store'), [
    //     	'name' => fake()->name(),
    //     	'permissions' => [1],
    //     ]);

    //     $response->assertStatus(404);
    // }

    public function test_no_admin_store_role(): void
    {
    	$permission = Permission::create(['slug' => 'admin-panel']);
    	$role = Role::factory()
    	->has(Permission::create(['slug' => 'admin-panel']))
    	->has(Permission::create(['slug' => 'role-create']))
    	->create();

    	$user = User::factory()->create([
    		'role_id' => $role->id
    	]);

        $response = $this->actingAs($user)->post(route('admin.roles.store'), [
        	'name' => fake()->name(),
        	'permissions' => [1],
        ]);

        $response->assertStatus(404);
    }
}
