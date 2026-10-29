<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ProductionErrorHandlingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_unhandled_exceptions_show_a_generic_page_when_debug_is_disabled(): void
    {
        config(['app.debug' => false]);

        Route::get('/_test-unhandled-error', function () {
            throw new \RuntimeException('Private database connection details');
        });

        $this->get('/_test-unhandled-error')
            ->assertStatus(500)
            ->assertSee('حدث خطأ غير متوقع')
            ->assertSee('Developed by :')
            ->assertDontSee('Private database connection details')
            ->assertDontSee('RuntimeException');
    }
}
