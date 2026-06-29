<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageStat extends Model
{
    use HasFactory;

    public const ICONS = [
        'users' => [
            'label' => 'Học viên',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />',
        ],
        'visa' => [
            'label' => 'Visa',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.25-2.25v8.25a2.25 2.25 0 01-2.25 2.25H5.75A2.25 2.25 0 013.5 16V7.75A2.25 2.25 0 015.75 5.5h7.379a2.25 2.25 0 011.591.659l3.871 3.871a2.25 2.25 0 01.659 1.591z" />',
        ],
        'university' => [
            'label' => 'Trường học',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9.75 12 4l9 5.75-9 5.75L3 9.75Z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 11.75v4.5c0 .414.336.75.75.75h9a.75.75 0 00.75-.75v-4.5" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.75 10.75v5.5" />',
        ],
        'certificate' => [
            'label' => 'Chứng chỉ',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75 11.25 15 15 9.75" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 3.75h9A2.25 2.25 0 0118.75 6v12A2.25 2.25 0 0116.5 20.25h-9A2.25 2.25 0 015.25 18V6A2.25 2.25 0 017.5 3.75z" />',
        ],
        'scholarship' => [
            'label' => 'Học bổng',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9.813 15.904.778 4.536a.75.75 0 001.09.542l3.997-2.102 3.997 2.102a.75.75 0 001.09-.542l-.778-4.536 3.295-3.212a.75.75 0 00-.416-1.28l-4.554-.662L15.97 6.62a.75.75 0 00-1.344 0l-2.037 4.13-4.554.662a.75.75 0 00-.416 1.28l3.294 3.212z" />',
        ],
        'globe' => [
            'label' => 'Quốc tế',
            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3.75a8.25 8.25 0 100 16.5 8.25 8.25 0 000-16.5z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12h16.5" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3.75c2.1 2.275 3.375 5.184 3.375 8.25 0 3.066-1.275 5.975-3.375 8.25-2.1-2.275-3.375-5.184-3.375-8.25 0-3.066 1.275-5.975 3.375-8.25z" />',
        ],
    ];

    protected $fillable = [
        'label',
        'value',
        'icon_key',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function iconOptions(): array
    {
        return collect(self::ICONS)->mapWithKeys(fn (array $icon, string $key) => [$key => $icon['label']])->all();
    }

    public function iconSvg(): string
    {
        return self::ICONS[$this->icon_key]['svg'] ?? self::ICONS['users']['svg'];
    }
}
