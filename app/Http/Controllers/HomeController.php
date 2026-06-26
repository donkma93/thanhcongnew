<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $content = $this->content();
        $articles = Article::with('category')->where('status', 'published')->latest('published_at')->take(3)->get();
        $scholarships = Article::with('category')->where('status', 'published')->where('is_scholarship', true)->latest('published_at')->take(6)->get();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->take(12)->get();
        $settings = Cache::remember('site_settings', now()->addHour(), fn () => Setting::pluck('value', 'key')->toArray());

        return view('home', compact('content', 'articles', 'scholarships', 'partners', 'settings'));
    }

    public static function defaultContent(): array
    {
        return [
            'hero_title' => 'Du học Hàn Quốc<br/> <span class="text-orange-400">Khởi đầu tương lai</span>',
            'hero_description' => 'Thành Công Edu tư vấn du học Hàn Quốc trọn gói: hệ tiếng, đại học, thạc sĩ, du học nghề và học bổng.',
            'stats_title' => '<span class="text-green-600">Thành Công Edu</span> Và Những Con <br/> Số Đáng Chú Ý',
            'stats_intro_1' => '<span class="font-bold text-gray-800">Công ty tư vấn du học Thành Công Edu</span> đồng hành cùng học viên Việt Nam xây dựng lộ trình học tập, hồ sơ và visa du học Hàn Quốc rõ ràng, phù hợp năng lực.',
            'stats_intro_2' => 'Thành Công Edu kết nối với nhiều trường đại học, cao đẳng và học viện Hàn Quốc, giúp học viên có thêm lựa chọn về ngành học, khu vực, học phí và học bổng.',
            'stats_intro_3' => 'Với quy trình tư vấn tận tâm, minh bạch và bám sát từng hồ sơ, Thành Công Edu hướng đến kết quả bền vững cho học viên và phụ huynh.',
            'scholarship_subtitle' => 'Săn Học Bổng Du Học Cùng Thành Công Edu',
            'scholarship_description' => 'Thành Công Edu hỗ trợ học viên tìm kiếm chương trình học bổng phù hợp tại Hàn Quốc, chuẩn bị hồ sơ, kế hoạch học tập và luyện phỏng vấn theo từng mục tiêu.',
            'testimonials_title' => 'Vinh Danh <span class="text-orange-600">Học Viên Xuất Sắc</span>',
            'programs_title' => '<span class="text-blue-900">TÌM HIỂU</span> <span class="text-red-600">CÁC HỆ DU HỌC</span>',
            'news_title' => 'Tin Tức & Học Bổng <span class="text-blue-600">Hàn Quốc</span>',
            'consultation_description' => 'Để lại thông tin, chuyên gia của Thành Công Edu sẽ liên hệ tư vấn lộ trình du học phù hợp nhất với bạn.',
        ];
    }

    public function content(): array
    {
        return Cache::remember('homepage_content', now()->addHour(), function () {
            if (! Storage::exists('homepage.json')) return self::defaultContent();
            $content = json_decode(Storage::get('homepage.json'), true);
            if (! is_array($content)) return self::defaultContent();
            return array_merge(self::defaultContent(), $content);
        });
    }
}
