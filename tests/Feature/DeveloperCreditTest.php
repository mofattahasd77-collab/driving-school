<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeveloperCreditTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_developer_credit_links_to_whatsapp_on_public_practice_and_login_pages(): void
    {
        foreach (['home', 'practice.index', 'login'] as $route) {
            $this->get(route($route))
                ->assertOk()
                ->assertSee('Developed by :')
                ->assertSee('href="https://wa.me/963985326221"', false)
                ->assertSee('Mohammad Abdulfattah');
        }
    }

    public function test_developer_credit_links_to_whatsapp_on_admin_pages(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Developed by :')
            ->assertSee('href="https://wa.me/963985326221"', false)
            ->assertSee('Mohammad Abdulfattah');
    }
}
