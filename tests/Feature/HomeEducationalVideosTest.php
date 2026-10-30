<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HomeEducationalVideosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_homepage_lists_supported_educational_videos_in_natural_order(): void
    {
        Storage::fake('tutorial_videos', ['url' => '/videos']);
        Storage::disk('tutorial_videos')->put('10-parking.webm', 'video');
        Storage::disk('tutorial_videos')->put('2-starting safely.mp4', 'video');
        Storage::disk('tutorial_videos')->put('notes.txt', 'not a video');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('فيديوهات تعليمية قصيرة')
            ->assertSee('2 starting safely')
            ->assertSee('10 parking')
            ->assertSee('type="video/mp4"', false)
            ->assertSee('type="video/webm"', false)
            ->assertSee('src="/videos/2-starting%20safely.mp4"', false)
            ->assertDontSee('notes.txt')
            ->assertSeeInOrder(['2 starting safely', '10 parking']);
    }

    public function test_homepage_explains_where_to_add_videos_when_the_folder_is_empty(): void
    {
        Storage::fake('tutorial_videos', ['url' => '/videos']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('public/videos')
            ->assertSee('MP4 أو WEBM أو OGG');
    }
}
