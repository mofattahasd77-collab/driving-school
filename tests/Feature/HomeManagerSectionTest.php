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

    public function test_homepage_displays_manager_details_and_call_and_whatsapp_links(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('أ. باسل بكداش')
            ->assertSee('0957836397')
            ->assertSee('الصورة التعريفية ستضاف قريبًا')
            ->assertSee('href="tel:+963957836397"', false)
            ->assertSee('href="https://wa.me/963957836397"', false);
    }
}
