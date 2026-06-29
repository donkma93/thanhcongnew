<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\HeroSlider;
use App\Models\HomepageStat;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\StudentAchievement;
use App\Models\StudyProgram;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    private function mock(string $path): string
    {
        return $path;
    }

    public function run(): void
    {
        $this->seedUsers();
        $this->seedSettings();
        $this->seedHomepageContent();
        $this->seedSliders();
        $this->seedStats();
        $this->seedPrograms();
        $this->seedTestimonials();
        $this->seedAchievements();
        $this->seedPartners();
        $this->seedCategoriesAndArticles();
        $this->seedConsultations();
    }

    private function seedUsers(): void
    {
        foreach ([
            [
                'email' => 'admin@thanhcongedu.vn',
                'name' => 'Quản trị viên',
                'password' => 'admin123456',
                'role' => 'admin',
            ],
            [
                'email' => 'manager@thanhcongedu.vn',
                'name' => 'Quản lý nội dung',
                'password' => 'manager123456',
                'role' => 'manager',
            ],
            [
                'email' => 'editor@thanhcongedu.vn',
                'name' => 'Biên tập viên demo',
                'password' => 'editor123456',
                'role' => 'editor',
            ],
        ] as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedSettings(): void
    {
        foreach ([
            'site_name' => 'Thành Công Edu',
            'hotline' => '0909 123 456',
            'email' => 'contact@thanhcongedu.vn',
            'address' => '268 Nguyễn Thái Sơn, Gò Vấp, TP. Hồ Chí Minh',
            'facebook' => 'https://facebook.com/thanhcongedu',
            'zalo' => 'https://zalo.me/0909123456',
        ] as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => 'general']
            );
        }
    }

    private function seedHomepageContent(): void
    {
        Storage::put('homepage.json', json_encode([
            'hero_title' => 'Du học Hàn Quốc<br/> <span class="text-orange-400">Lộ trình rõ ràng, kết quả vững vàng</span>',
            'hero_description' => 'Thành Công Edu đồng hành từ tư vấn chọn hệ học, luyện hồ sơ, xin học bổng đến hoàn thiện visa cho học viên Việt Nam.',
            'stats_title' => '<span class="text-green-600">Thành Công Edu</span> Và Những Con <br/> Số Đáng Tin Cậy',
            'stats_intro_1' => '<span class="font-bold text-gray-800">Thành Công Edu</span> xây dựng lộ trình du học Hàn Quốc cá nhân hóa cho từng học viên, từ định hướng ban đầu đến ngày xuất cảnh.',
            'stats_intro_2' => 'Đội ngũ chuyên viên theo sát tiến độ hồ sơ, cập nhật liên tục thông tin trường, học bổng và điều kiện visa mới nhất để phụ huynh và học viên an tâm.',
            'stats_intro_3' => 'Mỗi số liệu trên website đều có thể cập nhật trong quản trị để doanh nghiệp chủ động truyền thông và giới thiệu năng lực thật của trung tâm.',
            'stats_cta_text' => 'Đăng ký tư vấn ngay',
            'stats_cta_link' => '#consultation-form',
            'scholarship_badge_title' => 'Cơ Hội',
            'scholarship_subtitle' => 'Học Bổng Du Học Hàn Quốc Được Cập Nhật Liên Tục',
            'scholarship_description' => 'Không chỉ giới thiệu học bổng, Thành Công Edu còn hỗ trợ học viên lên chiến lược nộp hồ sơ, viết study plan, chuẩn bị TOPIK và luyện phỏng vấn để tăng tỷ lệ đạt học bổng thực tế.',
            'scholarship_logo_text' => 'THÀNH CÔNG EDU',
            'scholarship_feature_image' => $this->mock('mock/scholarship/feature.svg'),
            'scholarship_badge_label_1' => 'Học bổng',
            'scholarship_badge_value_1' => '100%',
            'scholarship_badge_caption_1' => 'học phí',
            'scholarship_badge_label_2' => 'Hỗ trợ',
            'scholarship_badge_value_2' => '1:1',
            'scholarship_badge_caption_2' => 'chiến lược hồ sơ',
            'scholarship_badge_label_3' => 'Ưu đãi',
            'scholarship_badge_value_3' => '50%',
            'scholarship_badge_caption_3' => 'ký túc xá',
            'scholarship_cta_text' => 'Khám phá học bổng phù hợp',
            'scholarship_cta_link' => '#news-section',
            'achievements_title' => 'Vinh Danh <span class="text-orange-600">Học Viên Xuất Sắc</span>',
            'achievements_subtitle' => 'Những học viên tiêu biểu với kết quả học bổng, visa và năng lực nổi bật được Thành Công Edu đồng hành xuyên suốt.',
            'testimonials_title' => 'Sinh Viên Nói Gì <span class="text-orange-600">Về Chúng Tôi</span>',
            'programs_title' => '<span class="text-blue-900">LỘ TRÌNH</span> <span class="text-red-600">CÁC HỆ DU HỌC</span>',
            'programs_badge_text' => 'E-VISA - Hỗ trợ chuẩn bị hồ sơ điện tử nhanh chóng',
            'programs_cta_text' => 'Tìm hiểu chương trình phù hợp',
            'programs_cta_link' => '#consultation-form',
            'news_title' => 'Tin Tức & Cẩm Nang <span class="text-blue-600">Du Học Hàn Quốc</span>',
            'news_subtitle' => 'Toàn bộ bài viết, học bổng và tin tư vấn hiển thị trực tiếp từ khu quản trị để đội ngũ có thể cập nhật hằng ngày.',
            'news_cta_text' => 'Xem toàn bộ bài viết',
            'consultation_description' => 'Để lại thông tin, chuyên gia của Thành Công Edu sẽ liên hệ tư vấn hệ học, ngân sách, tỷ lệ học bổng và phương án hồ sơ phù hợp nhất.',
            'consultation_benefit_1' => 'Tư vấn chọn hệ học và trường phù hợp',
            'consultation_benefit_2' => 'Định hướng học bổng theo năng lực thực tế',
            'consultation_benefit_3' => 'Hỗ trợ hồ sơ và visa từ A-Z',
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private function seedSliders(): void
    {
        HeroSlider::query()->update(['is_active' => false]);

        foreach ([
            [
                'title' => 'Du học Hàn Quốc<br/> <span class="text-orange-400">Từ hệ tiếng đến thạc sĩ</span>',
                'description' => 'Đội ngũ Thành Công Edu đồng hành từ định hướng, hồ sơ, học bổng đến khi bạn đặt chân tới Hàn Quốc.',
                'background_image' => $this->mock('mock/sliders/hero-campus.svg'),
                'button_text' => 'Đăng ký tư vấn',
                'button_link' => '#consultation-form',
                'overlay_class' => 'bg-blue-900/65',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Săn học bổng Hàn Quốc<br/> <span class="text-yellow-400">Có chiến lược, có kết quả</span>',
                'description' => 'Tối ưu lộ trình TOPIK, study plan, thư giới thiệu và phỏng vấn với đội ngũ chuyên viên nhiều kinh nghiệm.',
                'background_image' => $this->mock('mock/sliders/hero-scholarship.svg'),
                'button_text' => 'Xem học bổng nổi bật',
                'button_link' => '#news-section',
                'overlay_class' => 'bg-purple-900/65',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Hồ sơ visa chuẩn chỉnh<br/> <span class="text-green-400">Theo sát từng bước</span>',
                'description' => 'Minh bạch tiến độ, checklist rõ ràng, hỗ trợ phụ huynh và học viên an tâm trong suốt quá trình nộp hồ sơ.',
                'background_image' => $this->mock('mock/sliders/hero-visa.svg'),
                'button_text' => 'Nhận checklist miễn phí',
                'button_link' => '#consultation-form',
                'overlay_class' => 'bg-green-900/65',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ] as $slider) {
            HeroSlider::updateOrCreate(
                ['sort_order' => $slider['sort_order']],
                $slider
            );
        }
    }

    private function seedStats(): void
    {
        HomepageStat::query()->update(['is_active' => false]);

        foreach ([
            ['label' => 'Học viên đã tư vấn', 'value' => '3.500+', 'icon_key' => 'users', 'sort_order' => 1, 'is_active' => true],
            ['label' => 'Tỷ lệ đậu visa', 'value' => '98%', 'icon_key' => 'visa', 'sort_order' => 2, 'is_active' => true],
            ['label' => 'Trường đối tác', 'value' => '120+', 'icon_key' => 'university', 'sort_order' => 3, 'is_active' => true],
            ['label' => 'Học viên đạt TOPIK', 'value' => '92%', 'icon_key' => 'certificate', 'sort_order' => 4, 'is_active' => true],
        ] as $stat) {
            HomepageStat::updateOrCreate(
                ['label' => $stat['label']],
                $stat
            );
        }
    }

    private function seedPrograms(): void
    {
        StudyProgram::query()->update(['is_active' => false]);

        foreach ([
            [
                'code' => 'D4-1',
                'title' => 'Du học hệ tiếng D4-1',
                'description' => 'Phù hợp với học viên cần xây nền tiếng Hàn trước khi chuyển tiếp lên chuyên ngành, đại học hoặc cao học.',
                'theme_key' => 'blue',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'D2-1',
                'title' => 'Du học nghề D2-1',
                'description' => 'Lộ trình chú trọng thực hành, phù hợp với học viên muốn sớm tiếp cận môi trường nghề nghiệp và việc làm sau tốt nghiệp.',
                'theme_key' => 'emerald',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'D2-2',
                'title' => 'Du học chuyên ngành D2-2',
                'description' => 'Dành cho học viên đã có năng lực tiếng Hàn, muốn theo học đại học chính quy với nhiều nhóm ngành hot tại Hàn Quốc.',
                'theme_key' => 'amber',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'D2-3',
                'title' => 'Du học thạc sĩ D2-3',
                'description' => 'Lộ trình dành cho cử nhân muốn nâng cao chuyên môn, mở rộng cơ hội nghề nghiệp quốc tế và định hướng nghiên cứu.',
                'theme_key' => 'rose',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ] as $program) {
            StudyProgram::updateOrCreate(
                ['code' => $program['code']],
                $program
            );
        }
    }

    private function seedTestimonials(): void
    {
        Testimonial::query()->update(['is_active' => false]);

        foreach ([
            [
                'student_name' => 'Nguyễn Thu Hà',
                'course_name' => 'Hệ tiếng D4-1',
                'avatar' => $this->mock('mock/testimonials/thu-ha.svg'),
                'content' => 'Em được hỗ trợ rất kỹ từ lúc chọn trường, hoàn thiện hồ sơ đến khi đậu visa. Mọi bước đều rõ ràng nên gia đình em rất yên tâm.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'student_name' => 'Trần Minh Tuấn',
                'course_name' => 'Đại học Hanyang',
                'avatar' => $this->mock('mock/testimonials/minh-tuan.svg'),
                'content' => 'Điều em ấn tượng nhất là đội ngũ theo sát tiến độ từng tuần. Em đậu visa ngay lần đầu và sang trường đúng kế hoạch.',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'student_name' => 'Lê Mai Anh',
                'course_name' => 'Học bổng 50% Kyung Hee',
                'avatar' => $this->mock('mock/testimonials/mai-anh.svg'),
                'content' => 'Trung tâm tư vấn đúng năng lực của em, giúp em chọn chiến lược học bổng phù hợp và chuẩn bị phỏng vấn rất bài bản.',
                'rating' => 5,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'student_name' => 'Phạm Quốc Bảo',
                'course_name' => 'Du học nghề D2-1',
                'avatar' => $this->mock('mock/testimonials/quoc-bao.svg'),
                'content' => 'Em thích cách làm việc chuyên nghiệp và thực tế. Từ hồ sơ tài chính đến các buổi luyện phản xạ đều rất sát nhu cầu.',
                'rating' => 4,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'student_name' => 'Đỗ Khánh Linh',
                'course_name' => 'Thạc sĩ ngành Marketing',
                'avatar' => $this->mock('mock/testimonials/khanh-linh.svg'),
                'content' => 'Em được hỗ trợ mạnh ở phần chọn giáo sư, chỉnh study plan và chuẩn bị chứng từ nên quá trình nộp hồ sơ rất tự tin.',
                'rating' => 5,
                'sort_order' => 5,
                'is_active' => true,
            ],
        ] as $testimonial) {
            Testimonial::updateOrCreate(
                ['student_name' => $testimonial['student_name']],
                $testimonial
            );
        }
    }

    private function seedAchievements(): void
    {
        StudentAchievement::query()->update(['is_active' => false]);

        foreach ([
            [
                'student_name' => 'Nguyễn Hoàng Yến',
                'program_name' => 'Đại học Yonsei',
                'achievement_title' => 'Đậu học bổng 100% học phí kỳ đầu',
                'achievement_description' => 'Hoàng Yến được trung tâm đồng hành từ xây dựng hồ sơ học thuật, định hướng bài luận đến luyện phỏng vấn, giúp em đạt học bổng đầu vào giá trị cao ngay kỳ nhập học đầu tiên.',
                'avatar' => $this->mock('mock/achievements/hoang-yen.svg'),
                'result_badge' => 'Học bổng 100%',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'student_name' => 'Trần Gia Bảo',
                'program_name' => 'Hệ tiếng D4-1',
                'achievement_title' => 'Visa thẳng ngay lần nộp đầu tiên',
                'achievement_description' => 'Gia Bảo hoàn thiện hồ sơ tài chính, học tập và lộ trình du học rõ ràng. Sau chuỗi buổi rà soát kỹ hồ sơ cùng trung tâm, em đạt visa ngay từ lần nộp đầu.',
                'avatar' => $this->mock('mock/achievements/gia-bao.svg'),
                'result_badge' => 'Visa thẳng',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'student_name' => 'Phạm Khánh Vy',
                'program_name' => 'TOPIK & Chuyên ngành',
                'achievement_title' => 'Đạt TOPIK 6 sau 14 tháng lộ trình',
                'achievement_description' => 'Khánh Vy theo lộ trình tăng tốc tiếng Hàn có giám sát sát sao, kết hợp bài tập cá nhân hóa và luyện đề định kỳ, từ đó đạt TOPIK 6 để chuyển tiếp chuyên ngành.',
                'avatar' => $this->mock('mock/achievements/khanh-vy.svg'),
                'result_badge' => 'TOPIK 6',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ] as $achievement) {
            StudentAchievement::updateOrCreate(
                ['student_name' => $achievement['student_name']],
                $achievement
            );
        }
    }

    private function seedPartners(): void
    {
        Partner::query()->update(['is_active' => false]);

        foreach ([
            [
                'name' => 'Yonsei University',
                'logo' => $this->mock('mock/partners/yonsei.svg'),
                'website' => 'https://www.yonsei.ac.kr',
                'description' => 'Đối tác định hướng hồ sơ hệ đại học và cao học.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Korea University',
                'logo' => $this->mock('mock/partners/korea-university.svg'),
                'website' => 'https://www.korea.edu',
                'description' => 'Đối tác tuyển sinh nhiều nhóm ngành thế mạnh.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Hanyang University',
                'logo' => $this->mock('mock/partners/hanyang.svg'),
                'website' => 'https://www.hanyang.ac.kr',
                'description' => 'Phù hợp hệ kỹ thuật, quản trị và truyền thông.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Kyung Hee University',
                'logo' => $this->mock('mock/partners/kyung-hee.svg'),
                'website' => 'https://www.khu.ac.kr',
                'description' => 'Nhiều lựa chọn học bổng và ký túc xá cho học viên quốc tế.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Dongguk University',
                'logo' => $this->mock('mock/partners/dongguk.svg'),
                'website' => 'https://www.dongguk.edu',
                'description' => 'Thế mạnh về nghệ thuật, công nghệ và quản trị.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'SeoulTech',
                'logo' => $this->mock('mock/partners/seoultech.svg'),
                'website' => 'https://www.seoultech.ac.kr',
                'description' => 'Định hướng mạnh về ngành công nghệ và kỹ thuật ứng dụng.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Keimyung University',
                'logo' => $this->mock('mock/partners/keimyung.svg'),
                'website' => 'https://www.kmu.ac.kr',
                'description' => 'Môi trường phù hợp với học viên muốn tối ưu học phí.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Inha University',
                'logo' => $this->mock('mock/partners/inha.svg'),
                'website' => 'https://www.inha.ac.kr',
                'description' => 'Nổi bật ở các ngành logistics, kỹ thuật và công nghệ.',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ] as $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']],
                $partner
            );
        }
    }

    private function seedCategoriesAndArticles(): void
    {
        $categories = [];

        foreach ([
            [
                'name' => 'Visa du học',
                'slug' => 'visa-du-hoc',
                'description' => 'Thông tin hồ sơ, phỏng vấn và kinh nghiệm xin visa du học Hàn Quốc.',
            ],
            [
                'name' => 'Học bổng Hàn Quốc',
                'slug' => 'hoc-bong-han-quoc',
                'description' => 'Tổng hợp học bổng chính phủ, học bổng trường và mẹo săn học bổng hiệu quả.',
            ],
            [
                'name' => 'Cẩm nang du học',
                'slug' => 'cam-nang-du-hoc',
                'description' => 'Kinh nghiệm chọn trường, chi phí, ký túc xá và đời sống du học sinh.',
            ],
            [
                'name' => 'Hệ du học nghề',
                'slug' => 'he-du-hoc-nghe',
                'description' => 'Nội dung về hệ nghề, việc làm và lộ trình thực hành tại Hàn Quốc.',
            ],
            [
                'name' => 'Trường học Hàn Quốc',
                'slug' => 'truong-hoc-han-quoc',
                'description' => 'Giới thiệu trường, ngành học và môi trường học tập tại Hàn Quốc.',
            ],
        ] as $categoryData) {
            $category = Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );

            $categories[$category->slug] = $category;
        }

        foreach ([
            [
                'title' => 'Visa D4-1 là gì? Lộ trình chuẩn bị hồ sơ từ A-Z cho học viên mới',
                'slug' => 'visa-d4-1-la-gi-lo-trinh-chuan-bi-ho-so-tu-a-z',
                'excerpt' => 'Tổng hợp chi tiết điều kiện, hồ sơ, timeline nộp và các lỗi thường gặp khi xin visa D4-1.',
                'meta_title' => 'Visa D4-1 là gì? Hồ sơ và kinh nghiệm xin visa mới nhất',
                'meta_description' => 'Bài viết tổng hợp chi tiết về visa D4-1, hồ sơ cần chuẩn bị và kinh nghiệm tăng tỷ lệ đậu visa.',
                'thumbnail' => $this->mock('mock/articles/visa-d4-1.svg'),
                'content' => '<p>Visa D4-1 là lựa chọn phổ biến cho học viên muốn sang Hàn Quốc học tiếng trước khi chuyển tiếp lên chuyên ngành. Thành Công Edu khuyến nghị học viên chuẩn bị hồ sơ ít nhất 3 đến 5 tháng trước kỳ nhập học để có thời gian xử lý giấy tờ và luyện phỏng vấn.</p><p>Bộ hồ sơ tiêu chuẩn bao gồm hồ sơ học tập, chứng minh tài chính, kế hoạch học tập, giấy tờ cá nhân và các biểu mẫu theo yêu cầu của trường. Việc chuẩn bị đúng từ đầu giúp giảm đáng kể rủi ro thiếu giấy tờ hoặc nộp lại nhiều lần.</p><p>Ngoài hồ sơ, thái độ trong buổi phỏng vấn và khả năng trình bày mục tiêu học tập cũng là yếu tố quyết định. Trung tâm nên xây dựng checklist nội bộ và mô phỏng phỏng vấn cho học viên để nâng cao tỷ lệ thành công.</p>',
                'category_slug' => 'visa-du-hoc',
                'is_scholarship' => false,
                'status' => 'published',
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Học bổng GKS 2026: Điều kiện ứng tuyển và chiến lược làm hồ sơ nổi bật',
                'slug' => 'hoc-bong-gks-2026-dieu-kien-ung-tuyen-va-chien-luoc-lam-ho-so',
                'excerpt' => 'Phân tích hồ sơ GKS, các mốc thời gian quan trọng và cách xây study plan thuyết phục hội đồng.',
                'meta_title' => 'Học bổng GKS 2026 và chiến lược săn học bổng hiệu quả',
                'meta_description' => 'Tìm hiểu điều kiện, lộ trình và chiến lược chuẩn bị hồ sơ GKS cho học viên Việt Nam.',
                'thumbnail' => $this->mock('mock/articles/gks-2026.svg'),
                'content' => '<p>GKS là học bổng chính phủ Hàn Quốc có mức cạnh tranh cao nhưng rất đáng để đầu tư nếu học viên có mục tiêu rõ ràng. Bộ hồ sơ cần thể hiện được năng lực học tập, định hướng phát triển và mức độ phù hợp với chương trình đào tạo.</p><p>Study plan nên cho thấy học viên hiểu ngành học, có kế hoạch học tập cụ thể và gắn được mục tiêu tương lai với môi trường học tại Hàn Quốc. Ngoài ra, thư giới thiệu cũng cần có chiều sâu, phản ánh đúng điểm mạnh và tính kỷ luật của ứng viên.</p><p>Trung tâm nên chia lộ trình GKS thành nhiều chặng nhỏ: chuẩn bị chứng chỉ, xây bộ bài luận, chọn trường phù hợp và luyện phỏng vấn chuyên sâu để tăng khả năng lọt vào vòng cuối.</p>',
                'category_slug' => 'hoc-bong-han-quoc',
                'is_scholarship' => true,
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Chi phí du học Hàn Quốc 2026: Học phí, ký túc xá và sinh hoạt thực tế',
                'slug' => 'chi-phi-du-hoc-han-quoc-2026-hoc-phi-ky-tuc-xa-va-sinh-hoat',
                'excerpt' => 'Bảng tổng hợp ngân sách du học theo hệ học và thành phố để phụ huynh dễ lên kế hoạch tài chính.',
                'meta_title' => 'Chi phí du học Hàn Quốc 2026 đầy đủ và dễ hiểu',
                'meta_description' => 'Tổng hợp học phí, ký túc xá, sinh hoạt và ngân sách du học Hàn Quốc theo từng hệ học.',
                'thumbnail' => $this->mock('mock/articles/chi-phi-du-hoc.svg'),
                'content' => '<p>Ngân sách du học Hàn Quốc thay đổi theo hệ học, khu vực và chính sách trường. Với hệ tiếng, học viên cần dự trù học phí, ký túc xá, bảo hiểm, giáo trình và chi phí sinh hoạt cơ bản trong ít nhất 6 tháng đầu.</p><p>Seoul thường có mức sinh hoạt cao hơn các tỉnh, nhưng cơ hội làm thêm và kết nối học tập cũng nhiều hơn. Các trường khu vực lại có mức học phí và nhà ở dễ chịu hơn, phù hợp với học viên cần tối ưu ngân sách.</p><p>Do đó, trung tâm nên tư vấn tài chính theo từng hồ sơ thay vì đưa một con số chung. Phụ huynh cần thấy rõ cơ cấu chi phí để dễ chuẩn bị và ra quyết định.</p>',
                'category_slug' => 'cam-nang-du-hoc',
                'is_scholarship' => false,
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Top học bổng 50% đến 100% học phí tại các trường tư thục Hàn Quốc',
                'slug' => 'top-hoc-bong-50-den-100-hoc-phi-tai-cac-truong-tu-thuc-han-quoc',
                'excerpt' => 'Danh sách học bổng trường dễ tiếp cận hơn GKS nhưng vẫn rất giá trị cho học viên có năng lực tốt.',
                'meta_title' => 'Top học bổng trường Hàn Quốc đáng quan tâm nhất',
                'meta_description' => 'Danh sách học bổng 50% đến 100% học phí tại nhiều trường Hàn Quốc dành cho học viên quốc tế.',
                'thumbnail' => $this->mock('mock/articles/top-hoc-bong.svg'),
                'content' => '<p>Bên cạnh học bổng chính phủ, nhiều trường đại học Hàn Quốc có học bổng đầu vào rất tốt cho học viên quốc tế. Điều kiện thường xoay quanh GPA, TOPIK hoặc IELTS, cùng với hồ sơ học tập và định hướng rõ ràng.</p><p>Đây là lựa chọn thực tế cho nhiều gia đình vì tỷ lệ cạnh tranh mềm hơn và cơ hội giữ học bổng vẫn cao nếu học viên duy trì kết quả tốt. Mỗi trường sẽ có chính sách học bổng khác nhau theo khoa và kỳ học.</p><p>Trung tâm nên xây thư viện học bổng nội bộ theo từng nhóm hồ sơ để học viên không bị ngợp khi so sánh quá nhiều lựa chọn cùng lúc.</p>',
                'category_slug' => 'hoc-bong-han-quoc',
                'is_scholarship' => true,
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Du học nghề Hàn Quốc có phù hợp với học viên muốn đi nhanh và thực tế?',
                'slug' => 'du-hoc-nghe-han-quoc-co-phu-hop-voi-hoc-vien-muon-di-nhanh',
                'excerpt' => 'Phân tích điểm mạnh, lưu ý hồ sơ và cơ hội việc làm của hệ du học nghề để phụ huynh dễ cân nhắc.',
                'meta_title' => 'Du học nghề Hàn Quốc: ưu điểm và lưu ý quan trọng',
                'meta_description' => 'Tìm hiểu hệ du học nghề Hàn Quốc, điều kiện đầu vào và định hướng việc làm sau tốt nghiệp.',
                'thumbnail' => $this->mock('mock/articles/du-hoc-nghe.svg'),
                'content' => '<p>Du học nghề Hàn Quốc thu hút nhiều học viên vì lộ trình ngắn hơn và thiên về kỹ năng thực hành. Đây là lựa chọn phù hợp với học viên muốn sớm tiếp cận môi trường nghề nghiệp hoặc có định hướng việc làm rõ ràng.</p><p>Tuy nhiên, hệ nghề không có nghĩa là dễ. Hồ sơ vẫn cần chứng minh mục tiêu học tập nghiêm túc, khả năng theo kịp chương trình và sự phù hợp giữa năng lực cá nhân với ngành đăng ký.</p><p>Trung tâm cần giải thích rõ ưu điểm, giới hạn và điều kiện từng trường để học viên không chọn hệ nghề chỉ vì muốn đi nhanh mà bỏ qua yếu tố phù hợp lâu dài.</p>',
                'category_slug' => 'he-du-hoc-nghe',
                'is_scholarship' => false,
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Săn học bổng trường SeoulTech: hồ sơ nào có cơ hội cao?',
                'slug' => 'san-hoc-bong-truong-seoultech-ho-so-nao-co-co-hoi-cao',
                'excerpt' => 'Định hướng hồ sơ, điểm mạnh cần thể hiện và những tiêu chí thường được trường SeoulTech đánh giá cao.',
                'meta_title' => 'Kinh nghiệm săn học bổng SeoulTech cho học viên Việt Nam',
                'meta_description' => 'Gợi ý chuẩn bị hồ sơ học bổng SeoulTech cho học viên muốn tối ưu khả năng được hỗ trợ học phí.',
                'thumbnail' => $this->mock('mock/articles/seoultech-scholarship.svg'),
                'content' => '<p>SeoulTech là lựa chọn phù hợp cho học viên quan tâm đến kỹ thuật, công nghệ và môi trường học thực hành. Học bổng của trường thường đánh giá khá kỹ trên nền tảng học tập, năng lực ngoại ngữ và định hướng ngành nghề.</p><p>Với học viên Việt Nam, một bộ hồ sơ được xây chỉn chu với GPA tốt, bài luận rõ mục tiêu và chứng chỉ ngoại ngữ phù hợp có thể tạo ra lợi thế lớn. Điều quan trọng là hồ sơ phải đồng nhất, không có cảm giác sao chép hoặc trình bày mơ hồ.</p><p>Trung tâm nên có bộ form đánh giá nội bộ để nhanh chóng xếp hạng hồ sơ mạnh, trung bình, yếu trước khi đưa học viên vào lộ trình săn học bổng.</p>',
                'category_slug' => 'hoc-bong-han-quoc',
                'is_scholarship' => true,
                'status' => 'published',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Review 5 trường Hàn Quốc phù hợp với học viên tài chính tầm trung',
                'slug' => 'review-5-truong-han-quoc-phu-hop-voi-hoc-vien-tai-chinh-tam-trung',
                'excerpt' => 'Gợi ý các trường có học phí hợp lý, ký túc xá ổn và cộng đồng sinh viên quốc tế thân thiện.',
                'meta_title' => '5 trường Hàn Quốc phù hợp với ngân sách tầm trung',
                'meta_description' => 'Tổng hợp các trường Hàn Quốc phù hợp với học viên cần cân đối tài chính nhưng vẫn muốn chất lượng đào tạo tốt.',
                'thumbnail' => $this->mock('mock/articles/review-truong.svg'),
                'content' => '<p>Nhiều gia đình muốn tìm trường cân bằng giữa chi phí và chất lượng đào tạo. Với nhóm này, các trường khu vực hoặc các trường có chính sách học bổng đầu vào tốt là lựa chọn rất đáng cân nhắc.</p><p>Khi tư vấn, không nên chỉ nhìn vào học phí niêm yết mà cần tính thêm ký túc xá, chi phí sinh hoạt, cơ hội làm thêm và khả năng duy trì học bổng theo từng kỳ.</p><p>Việc đưa ra danh sách trường theo mức ngân sách giúp website thể hiện rõ năng lực tư vấn thực tế và tạo thêm niềm tin cho người xem.</p>',
                'category_slug' => 'truong-hoc-han-quoc',
                'is_scholarship' => false,
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Checklist hồ sơ du học mùa thu 2026',
                'slug' => 'checklist-ho-so-du-hoc-mua-thu-2026',
                'excerpt' => 'Bảng kiểm giúp học viên và phụ huynh theo dõi tiến độ hồ sơ theo từng tuần.',
                'meta_title' => 'Checklist hồ sơ du học mùa thu 2026',
                'meta_description' => 'Tải ngay checklist hồ sơ du học mùa thu 2026 để kiểm soát tiến độ chuẩn bị hiệu quả.',
                'thumbnail' => $this->mock('mock/articles/checklist-2026.svg'),
                'content' => '<p>Bài viết này tổng hợp các hạng mục cần hoàn thiện cho mùa tuyển sinh mùa thu, từ giấy tờ học tập, tài chính, chứng chỉ đến các form của trường. Rất phù hợp để dùng làm nội dung lead magnet hoặc tài nguyên tải về trên website.</p>',
                'category_slug' => 'cam-nang-du-hoc',
                'is_scholarship' => false,
                'status' => 'draft',
                'published_at' => null,
            ],
            [
                'title' => 'Thông báo lịch hội thảo du học Hàn Quốc tháng 8',
                'slug' => 'thong-bao-lich-hoi-thao-du-hoc-han-quoc-thang-8',
                'excerpt' => 'Lịch hội thảo, các chủ đề tư vấn và khách mời đồng hành trong tháng 8.',
                'meta_title' => 'Lịch hội thảo du học Hàn Quốc tháng 8',
                'meta_description' => 'Xem lịch hội thảo và các chủ đề tư vấn du học Hàn Quốc trong tháng 8.',
                'thumbnail' => $this->mock('mock/articles/hoi-thao-thang-8.svg'),
                'content' => '<p>Nội dung dành cho landing sự kiện, thông báo hội thảo và mini workshop tư vấn trực tiếp. Có thể dùng để trình diễn luồng bài viết ẩn/hiện trong khu quản trị.</p>',
                'category_slug' => 'cam-nang-du-hoc',
                'is_scholarship' => false,
                'status' => 'hidden',
                'published_at' => null,
            ],
        ] as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'title' => $article['title'],
                    'excerpt' => $article['excerpt'],
                    'meta_title' => $article['meta_title'],
                    'meta_description' => $article['meta_description'],
                    'thumbnail' => $article['thumbnail'],
                    'content' => $article['content'],
                    'category_id' => $categories[$article['category_slug']]->id,
                    'is_scholarship' => $article['is_scholarship'],
                    'status' => $article['status'],
                    'published_at' => $article['published_at'],
                ]
            );
        }
    }

    private function seedConsultations(): void
    {
        foreach ([
            [
                'name' => 'Ngô Thị Hồng Vân',
                'phone' => '0903000111',
                'email' => 'van.ngo@example.com',
                'destination' => 'TiengHan',
                'message' => 'Em muốn tìm lộ trình D4-1 và trường có ký túc xá tốt tại Busan.',
            ],
            [
                'name' => 'Lý Gia Hưng',
                'phone' => '0911222333',
                'email' => 'hung.ly@example.com',
                'destination' => 'DaiHoc',
                'message' => 'Gia đình muốn tham khảo hệ D2-2 ngành công nghệ thông tin và ngân sách khoảng 350 triệu.',
            ],
            [
                'name' => 'Phan Bảo Ngọc',
                'phone' => '0933444555',
                'email' => 'ngoc.phan@example.com',
                'destination' => 'ThacSi',
                'message' => 'Mong được tư vấn học bổng thạc sĩ ngành truyền thông tại Seoul.',
            ],
            [
                'name' => 'Vũ Mạnh Quân',
                'phone' => '0966777888',
                'email' => 'quan.vu@example.com',
                'destination' => 'Nghe',
                'message' => 'Em muốn hỏi về du học nghề và khả năng làm thêm sau giờ học.',
            ],
            [
                'name' => 'Trịnh Khánh Vy',
                'phone' => '0988111222',
                'email' => 'vy.trinh@example.com',
                'destination' => 'Khac',
                'message' => 'Em cần được xem lại học bạ và tư vấn lộ trình phù hợp vì em bị gián đoạn việc học 1 năm.',
            ],
            [
                'name' => 'Đoàn Nhật Minh',
                'phone' => '0977555666',
                'email' => 'minh.doan@example.com',
                'destination' => 'TiengHan',
                'message' => 'Mình muốn xin lịch tư vấn trực tiếp vào cuối tuần cho cả phụ huynh và học sinh.',
            ],
        ] as $consultation) {
            Consultation::updateOrCreate(
                ['phone' => $consultation['phone']],
                $consultation
            );
        }
    }
}
