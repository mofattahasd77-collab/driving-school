<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeManagerSectionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_homepage_displays_management_team_and_manager_contact_links(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('الكادر الإداري')
            ->assertSee('أ. باسل بكداش')
            ->assertSee('مدير المدرسة')
            ->assertSee('0957836397')
            ->assertSeeTextInOrder([
                'الصورة التعريفية ستضاف قريبًا',
                'أ. باسل بكداش',
                'الصورة التعريفية ستضاف قريبًا',
                'مدير المدرسة',
            ])
            ->assertSee('href="tel:+963957836397"', false)
            ->assertSee('href="https://wa.me/963957836397"', false);
    }
}
