<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    public const THEMES = [
        'blue' => [
            'label' => 'Xanh dương',
            'badge' => 'bg-blue-600',
            'border' => 'border-blue-600',
            'ring' => 'from-blue-50 to-white',
            'text' => 'text-blue-700',
        ],
        'emerald' => [
            'label' => 'Xanh lá',
            'badge' => 'bg-emerald-600',
            'border' => 'border-emerald-600',
            'ring' => 'from-emerald-50 to-white',
            'text' => 'text-emerald-700',
        ],
        'amber' => [
            'label' => 'Vàng cam',
            'badge' => 'bg-amber-500',
            'border' => 'border-amber-500',
            'ring' => 'from-amber-50 to-white',
            'text' => 'text-amber-700',
        ],
        'rose' => [
            'label' => 'Hồng đỏ',
            'badge' => 'bg-rose-600',
            'border' => 'border-rose-600',
            'ring' => 'from-rose-50 to-white',
            'text' => 'text-rose-700',
        ],
    ];

    protected $fillable = [
        'code',
        'title',
        'description',
        'theme_key',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function themeOptions(): array
    {
        return collect(self::THEMES)->mapWithKeys(fn (array $theme, string $key) => [$key => $theme['label']])->all();
    }

    public function theme(): array
    {
        return self::THEMES[$this->theme_key] ?? self::THEMES['blue'];
    }
}
