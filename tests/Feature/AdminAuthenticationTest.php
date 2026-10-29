<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_admin_can_sign_in_and_reach_the_admin_dashboard(): void
    {
        $admin = User::factory()->admin()->create([
            'email' => 'admin@example.com',
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => 'ADMIN@example.com',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($admin);
        $this->get(route('admin.dashboard'))->assertOk();
    }

    public function test_non_admin_users_cannot_sign_in_to_the_admin_area(): void
    {
        User::factory()->create([
            'email' => 'visitor@example.com',
            'is_admin' => false,
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => 'visitor@example.com',
            'password' => 'password',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_guests_are_redirected_to_login_and_authenticated_non_admins_are_forbidden(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_public_registration_is_not_available(): void
    {
        $this->get('/register')->assertNotFound();
    }

    public function test_admin_can_sign_out(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest();
    }
}
