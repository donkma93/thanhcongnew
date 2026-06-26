<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@thanhcongedu.vn'],
            [
                'name' => 'Quản trị viên',
                'password' => Hash::make('admin123456'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        foreach ([
            'site_name' => 'Thành Công Edu',
            'hotline' => '0909 123 456',
            'email' => 'contact@thanhcongedu.vn',
            'address' => 'TP. Hồ Chí Minh, Việt Nam',
            'facebook' => '',
            'zalo' => '',
        ] as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'general']);
        }
    }
}
