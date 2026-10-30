<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $videoDisk = Storage::disk('tutorial_videos');
        $videoContentTypes = [
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogg' => 'video/ogg',
        ];
        $videos = collect($videoDisk->files())
            ->filter(function (string $path) use ($videoContentTypes): bool {
                return isset($videoContentTypes[Str::lower(pathinfo($path, PATHINFO_EXTENSION))]);
            })
            ->sortBy(fn (string $path): string => basename($path), SORT_NATURAL | SORT_FLAG_CASE)
            ->map(function (string $path) use ($videoContentTypes, $videoDisk): array {
                $extension = Str::lower(pathinfo($path, PATHINFO_EXTENSION));

                return [
                    'title' => Str::of(pathinfo($path, PATHINFO_FILENAME))
                        ->replace(['-', '_'], ' ')
                        ->squish()
                        ->toString(),
                    'url' => $videoDisk->url(implode('/', array_map('rawurlencode', explode('/', $path)))),
                    'type' => $videoContentTypes[$extension],
                ];
            })
            ->values();

        return view('home', [
            'contactInformation' => ContactInformation::query()->find(1),
            'videos' => $videos,
        ]);
    }
}
