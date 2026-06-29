<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\HeroSlider;
use App\Models\HomepageStat;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\StudentAchievement;
use App\Models\StudyProgram;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $content = $this->content();
        $sliders = HeroSlider::where('is_active', true)->orderBy('sort_order')->latest('id')->get();
        $stats = HomepageStat::where('is_active', true)->orderBy('sort_order')->latest('id')->get();
        $articles = Article::with('category')->where('status', 'published')->latest('published_at')->take(3)->get();
        $scholarships = Article::with('category')
            ->where('status', 'published')
            ->where('is_scholarship', true)
            ->latest('published_at')
            ->take(6)
            ->get();
        $achievements = StudentAchievement::where('is_active', true)->orderBy('sort_order')->latest('id')->get();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->take(12)->get();
        $programs = StudyProgram::where('is_active', true)->orderBy('sort_order')->latest('id')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->latest('id')->get();
        $settings = Cache::remember('site_settings', now()->addHour(), fn () => Setting::pluck('value', 'key')->toArray());

        return view('home', compact(
            'content',
            'sliders',
            'stats',
            'articles',
            'scholarships',
            'achievements',
            'partners',
            'programs',
            'settings',
            'testimonials',
        ));
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
            'stats_cta_text' => 'Đăng ký tư vấn ngay',
            'stats_cta_link' => '#consultation-form',
            'scholarship_badge_title' => 'Cơ Hội',
            'scholarship_subtitle' => 'Săn Học Bổng Du Học Cùng Thành Công Edu',
            'scholarship_description' => 'Thành Công Edu hỗ trợ học viên tìm kiếm chương trình học bổng phù hợp tại Hàn Quốc, chuẩn bị hồ sơ, kế hoạch học tập và luyện phỏng vấn theo từng mục tiêu.',
            'scholarship_logo_text' => 'THÀNH CÔNG EDU',
            'scholarship_feature_image' => 'mock/scholarship/feature.svg',
            'scholarship_badge_label_1' => 'Học bổng',
            'scholarship_badge_value_1' => '100%',
            'scholarship_badge_caption_1' => 'học phí',
            'scholarship_badge_label_2' => 'Học bổng',
            'scholarship_badge_value_2' => '50%',
            'scholarship_badge_caption_2' => 'chi phí',
            'scholarship_badge_label_3' => 'Học bổng',
            'scholarship_badge_value_3' => '15%',
            'scholarship_badge_caption_3' => 'nhập học',
            'scholarship_cta_text' => 'Tìm hiểu thêm về các chương trình',
            'scholarship_cta_link' => '#consultation-form',
            'achievements_title' => 'Vinh Danh <span class="text-orange-600">Học Viên Xuất Sắc</span>',
            'achievements_subtitle' => 'Những gương mặt nổi bật được Thành Công Edu đồng hành và bứt phá với thành tích ấn tượng.',
            'testimonials_title' => 'Vinh Danh <span class="text-orange-600">Học Viên Xuất Sắc</span>',
            'programs_title' => '<span class="text-blue-900">TÌM HIỂU</span> <span class="text-red-600">CÁC HỆ DU HỌC</span>',
            'programs_badge_text' => 'E-VISA - Hỗ trợ làm visa điện tử nhanh chóng',
            'programs_cta_text' => 'Tìm hiểu thêm về các chương trình',
            'programs_cta_link' => '#consultation-form',
            'news_title' => 'Tin Tức & Học Bổng <span class="text-blue-600">Hàn Quốc</span>',
            'news_subtitle' => 'Nội dung được cập nhật trực tiếp từ quản trị và hiển thị ngay ngoài trang chủ.',
            'news_cta_text' => 'Xem tất cả bài viết',
            'consultation_description' => 'Để lại thông tin, chuyên gia của Thành Công Edu sẽ liên hệ tư vấn lộ trình du học phù hợp nhất với bạn.',
            'consultation_benefit_1' => 'Tư vấn chọn trường, chọn ngành',
            'consultation_benefit_2' => 'Hỗ trợ săn học bổng giá trị cao',
            'consultation_benefit_3' => 'Hướng dẫn thủ tục visa từ A-Z',
        ];
    }

    public function content(): array
    {
        return Cache::remember('homepage_content', now()->addHour(), function () {
            if (! Storage::exists('homepage.json')) {
                return self::defaultContent();
            }

            $content = json_decode(Storage::get('homepage.json'), true);

            if (! is_array($content)) {
                return self::defaultContent();
            }

            return array_merge(self::defaultContent(), $content);
        });
    }
}
