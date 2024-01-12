<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;


class TokenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_token()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::factory()->create();
        $admin->roles()->attach($adminRole);

        $response = $this->actingAs($admin)
                         ->post('/api/tokens', ['name' => 'test token']);

        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Token created successfully');
    }
}
