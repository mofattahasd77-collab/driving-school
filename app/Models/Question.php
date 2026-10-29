<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public const CATEGORY_THEORY = 'theory';

    public const CATEGORY_MECHANICAL = 'mechanical';

    public const CATEGORY_SIGNS = 'signs';

    protected $attributes = [
        'category' => self::CATEGORY_THEORY,
    ];

    protected $fillable = [
        'question',
        'category',
        'options',
        'correct_option',
        'explanation',
        'image_path',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * @return array<string, string>
     */
    public static function categories(): array
    {
        return [
            self::CATEGORY_THEORY => 'النظرية',
            self::CATEGORY_MECHANICAL => 'الميكانيكية',
            self::CATEGORY_SIGNS => 'الإشارات',
        ];
    }
}
