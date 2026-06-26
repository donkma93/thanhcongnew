@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Hero Section with Swiper -->
<section class="relative overflow-hidden group h-[600px]">
    <div class="swiper hero-swiper h-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1546874177-9e664107314e?q=80&w=2069&auto=format&fit=crop');"></div>
                <div class="absolute inset-0 bg-blue-900/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl" data-aos="fade-up">
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-md">
                            {!! $content['hero_title'] !!}
                        </h1>
                        <p class="text-xl md:text-2xl text-blue-100 mb-10 drop-shadow-sm">
                            {{ $content['hero_description'] }}
                        </p>
                        <div class="flex flex-col md:flex-row justify-center gap-4">
                            <a href="#consultation-form" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-bold text-lg transition shadow-lg transform hover:scale-105 hover:-translate-y-1">
                                Tư vấn miễn phí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1538485399081-7191377e8241?q=80&w=2074&auto=format&fit=crop');"></div>
                <div class="absolute inset-0 bg-purple-900/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl">
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-md">
                            Học bổng GKS <br/> <span class="text-yellow-400">Chính phủ Hàn Quốc</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-purple-100 mb-10 drop-shadow-sm">
                            Hướng dẫn săn học bổng toàn phần (Học phí + Sinh hoạt phí) năm 2025.
                        </p>
                        <div class="flex flex-col md:flex-row justify-center gap-4">
                            <a href="#" class="bg-white text-purple-800 hover:bg-gray-100 px-8 py-3 rounded-full font-bold text-lg transition shadow-lg transform hover:scale-105 hover:-translate-y-1">
                                Chi tiết học bổng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Slide 3 -->
             <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1596423984390-d46747d79b63?q=80&w=2070&auto=format&fit=crop');"></div>
                <div class="absolute inset-0 bg-green-900/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl">
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-md">
                            Visa Thẳng <br/> <span class="text-green-400">Tỷ lệ đậu 99.9%</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-green-100 mb-10 drop-shadow-sm">
                            Đội ngũ xử lý hồ sơ chuyên nghiệp, cam kết không phát sinh chi phí.
                        </p>
                         <div class="flex flex-col md:flex-row justify-center gap-4">
                            <a href="#consultation-form" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-bold text-lg transition shadow-lg transform hover:scale-105 hover:-translate-y-1">
                                Nộp hồ sơ ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination & Navigation -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next text-white hover:text-orange-500 transition"></div>
        <div class="swiper-button-prev text-white hover:text-orange-500 transition"></div>
    </div>
</section>

<!-- Enhanced Stats Section -->
<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Left: Stats Grid -->
            <div class="lg:w-1/2">
                <div class="grid grid-cols-2 gap-8 text-center">
                    <!-- Stat 1 -->
                    <div class="flex flex-col items-center group">
                        <div class="w-24 h-24 rounded-full border-2 border-green-500 flex items-center justify-center mb-4 group-hover:bg-green-50 transition duration-300">
                             <!-- Icon: User/Student -->
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div class="text-3xl font-extrabold text-red-600 mb-1">3000+</div>
                        <div class="text-gray-700 font-medium">Số lượng học viên</div>
                    </div>
                     <!-- Stat 2 -->
                     <div class="flex flex-col items-center group">
                        <div class="w-24 h-24 rounded-full border-2 border-green-500 flex items-center justify-center mb-4 group-hover:bg-green-50 transition duration-300">
                             <!-- Icon: Graduate/Success -->
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="text-3xl font-extrabold text-red-600 mb-1">98%</div>
                        <div class="text-gray-700 font-medium">Tỷ lệ đậu visa</div>
                    </div>
                     <!-- Stat 3 -->
                     <div class="flex flex-col items-center group">
                        <div class="w-24 h-24 rounded-full border-2 border-green-500 flex items-center justify-center mb-4 group-hover:bg-green-50 transition duration-300">
                             <!-- Icon: University/School -->
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div class="text-3xl font-extrabold text-red-600 mb-1">100+</div>
                        <div class="text-gray-700 font-medium">Trường ĐH liên kết</div>
                    </div>
                     <!-- Stat 4 -->
                     <div class="flex flex-col items-center group">
                        <div class="w-24 h-24 rounded-full border-2 border-green-500 flex items-center justify-center mb-4 group-hover:bg-green-50 transition duration-300">
                             <!-- Icon: Topik/Link -->
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        </div>
                        <div class="text-3xl font-extrabold text-red-600 mb-1">98%</div>
                        <div class="text-gray-700 font-medium">Tỷ lệ đậu Topik</div>
                    </div>
                </div>
            </div>

            <!-- Right: Text Content -->
            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                    {!! $content['stats_title'] !!}
                </h2>
                <div class="space-y-4 text-gray-600 font-medium text-lg leading-relaxed text-justify">
                    <p>
                        {!! $content['stats_intro_1'] !!}
                    </p>
                    <p>
                        {{ $content['stats_intro_2'] }}
                    </p>
                    <p>
                        {{ $content['stats_intro_3'] }}
                    </p>
                </div>
                <div class="mt-8">
                    <a href="#consultation-form" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 hover:underline text-lg transition">
                        Đăng ký tư vấn ngay
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Stats Section -->
<section class="py-16 bg-white" data-aos="fade-up">
    <!-- ... (Stats Content remains same) ... -->
    <div class="container mx-auto px-4">
        <!-- ... -->
    </div>
</section>

<!-- Scholarship Opportunities Section -->
<section class="py-16 bg-white relative overflow-hidden" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12 items-start">
            <!-- Left: Title + Creative Visual Collage -->
            <div class="lg:w-2/5 space-y-6">
                <!-- Title -->
                <div>
                    <h2 class="text-4xl font-extrabold text-blue-900 leading-snug mb-1">
                        Cơ Hội
                    </h2>
                    <p class="text-2xl font-light text-blue-600">
                        {{ $content['scholarship_subtitle'] }}
                    </p>
                </div>

                <!-- Creative Visual Collage -->
                <div class="relative w-full h-96 max-w-md bg-gradient-to-br from-gray-50 to-white rounded-2xl p-4 shadow-lg">
                    <!-- THÀNH CÔNG EDU Logo Card -->
                    <div class="absolute -top-6 left-6 bg-white shadow-xl rounded-lg p-4 transform -rotate-3 z-30 border border-gray-100">
                        <div class="text-4xl font-black tracking-tight">
                            <span class="text-blue-900">THÀNH CÔNG</span><span class="text-yellow-400"> EDU</span>
                        </div>
                    </div>

                    <!-- Main Student Image -->
                    <div class="relative z-10 mt-8">
                        <img src="https://images.unsplash.com/photo-1524250502761-1ac6f2e30d43?q=80&w=800&auto=format&fit=crop" 
                             alt="Student" 
                             class="w-full h-auto rounded-lg shadow-md">
                    </div>

                    <!-- Scholarship Badge: 100% -->
                    <div class="absolute top-16 right-4 bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-md shadow-lg z-20 transform rotate-2">
                        <div class="text-xs">Học bổng</div>
                        <div class="text-2xl font-extrabold">100%</div>
                        <div class="text-xs">học phí</div>
                    </div>

                    <!-- Scholarship Badge: 50% -->
                    <div class="absolute bottom-32 -left-4 bg-orange-400 text-white font-bold px-4 py-2 rounded-md shadow-lg z-20 transform -rotate-3">
                        <div class="text-xs">Học bổng</div>
                        <div class="text-2xl font-extrabold">50%</div>
                    </div>

                    <!-- Scholarship Badge: 15% -->
                    <div class="absolute bottom-48 right-8 bg-gradient-to-r from-yellow-300 to-orange-300 text-blue-900 font-bold px-3 py-1.5 rounded-md shadow-md z-20 text-sm">
                        Học bổng <span class="text-lg">15%</span>
                    </div>

                    <!-- Landmark Icons (Bottom) - Using SVG placeholders -->
                    <div class="absolute -bottom-2 left-0 right-0 flex justify-center gap-4 z-20">
                        <div class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L4 6V8H3V20H9V14H15V20H21V8H20V6L12 2M12 4.3L18 7.2V8H6V7.2L12 4.3M5 10H7V12H5V10M9 10H11V12H9V10M13 10H15V12H13V10M17 10H19V12H17V10Z"/></svg>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 24 24"><path d="M21 9L12 2L3 9H5V20H19V9H21M7 18V11H17V18H7M9 13H11V16H9V13M13 13H15V16H13V13Z"/></svg>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 24 24"><path d="M6 18V14L4 16V11L12 2L20 11V16L18 14V18L16 20V14L12 10L8 14V20L6 18M12 4.6L6.5 11.8L8 13.3V16L10 14V19L12 21L14 19L14 14L16 16V13.3L17.5 11.8L12 4.6Z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Description + Navigation + Cards Slider -->
            <div class="lg:w-3/5 space-y-6">
                <!-- Top: Description Text + Navigation -->
                <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <p class="text-gray-600 leading-relaxed text-justify flex-1 text-sm md:text-base">
                        {{ $content['scholarship_description'] }}
                    </p>
                    
                    <!-- Navigation Arrows (Blue Circles) -->
                    <div class="flex gap-3 flex-shrink-0">
                        <button class="scholarship-prev w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button class="scholarship-next w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Swiper Cards -->
                <div class="swiper scholarship-swiper">
                    <div class="swiper-wrapper">
                        <!-- Card 1: Canada -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                                <div class="relative h-44 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1503614472-8c93d56e92ce?q=80&w=800&auto=format&fit=crop" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                                         alt="Canada Scholarship">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="bg-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow uppercase">Học bổng du học Hàn</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-base text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-blue-600 transition">
                                        Săn Học Bổng Du Học Canada 2025: Điều Kiện, Cách Săn
                                    </h3>
                                    <p class="text-xs text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                        Xin học bổng du học Canada 2025 có khó không? Tất tần tật thông tin về điều kiện, thủ tục xin học bổng...
                                    </p>
                                    <div class="flex justify-between items-center text-xs border-t border-gray-100 pt-3">
                                        <span class="text-gray-400">Ngày 10.05.2024</span>
                                        <button class="text-blue-600 font-semibold hover:underline">Xem chi tiết</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Singapore -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                                <div class="relative h-44 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?q=80&w=800&auto=format&fit=crop" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                                         alt="Singapore Scholarship">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow uppercase text-[10px]">THÀNH CÔNG EDU • SINGAPORE</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-base text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-blue-600 transition">
                                        Top Học Bổng Du Học Singapore Toàn Phần Năm 2025
                                    </h3>
                                    <p class="text-xs text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                        Tổng hợp danh sách các chương trình du học bổng giá trị, dễ săn tại Singapore năm 2025...
                                    </p>
                                    <div class="flex justify-between items-center text-xs border-t border-gray-100 pt-3">
                                        <span class="text-gray-400">Ngày 15.07.2024</span>
                                        <button class="text-blue-600 font-semibold hover:underline">Xem chi tiết</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Korea GKS -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                                <div class="relative h-44 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1546874177-9e664107314e?q=80&w=800&auto=format&fit=crop" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                                         alt="Korea Scholarship">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow uppercase">Học bổng GKS</span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-base text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-blue-600 transition">
                                        Học Bổng GKS 2025 - Cơ Hội Vàng Cho Du Học Sinh Việt
                                    </h3>
                                    <p class="text-xs text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                        Chương trình học bổng chính phủ Hàn Quốc GKS (Global Korea Scholarship) năm 2025...
                                    </p>
                                    <div class="flex justify-between items-center text-xs border-t border-gray-100 pt-3">
                                        <span class="text-gray-400">Ngày 20.08.2024</span>
                                        <button class="text-blue-600 font-semibold hover:underline">Xem chi tiết</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Student Testimonials Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 via-white to-purple-50 relative overflow-hidden" data-aos="fade-up">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-3 uppercase">
                {!! $content['testimonials_title'] !!}
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Những học viên tiêu biểu đã và đang học tập tại các trường đại học hàng đầu Hàn Quốc
            </p>
        </div>

        <!-- Testimonials Slider -->
        <div class="relative">
            <!-- Swiper Container -->
            <div class="swiper testimonials-swiper pb-12">
                <div class="swiper-wrapper pt-16 pb-8">
                    <!-- Student Card 1 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <!-- Decorative Top Wave with Gradient -->
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <!-- Decorative Corner Badge -->
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <!-- Student Standing Image with Glow Effect -->
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                
                                <!-- University Yellow Badge - Top Left -->
                                <div class="absolute -left-8 top-12 z-30">
                                    <div class="relative group/uni">
                                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div>
                                        <div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200">
                                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div>
                                            <div class="relative text-center">
                                                <div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div>
                                                <div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Yonsei</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Visa Blue Badge - Middle Right -->
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30">
                                    <div class="relative group/visa">
                                        <div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div>
                                        <div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50">
                                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div>
                                            <div class="relative text-center">
                                                <div class="text-[10px] font-bold opacity-90 mb-0.5">✈️</div>
                                                <div class="text-xs leading-tight whitespace-nowrap">HỆ<br/>D4-1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <!-- Name with Gradient Text -->
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Nguyễn Thu Hà
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">Hà Nội</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>

                                <!-- Testimonial with Better Styling -->
                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">
                                            "Em từng lo lắng vì tiếng Hàn yếu, nhưng nhờ Thành Công Edu, thầy cô kèm cặp sát sao. Giờ em đã có Topik và Visa thẳng. Cảm ơn trung tâm!"
                                        </p>
                                    </div>
                                </div>

                                <!-- Success Badge at Bottom -->
                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Card 2 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute -left-8 top-12 z-30"><div class="relative group/uni"><div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div><div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Hanyang</div></div></div></div></div>
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30"><div class="relative group/visa"><div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-90 mb-0.5">✈️</div><div class="text-xs leading-tight whitespace-nowrap">HỆ<br/>D2-2</div></div></div></div></div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Trần Minh Tuấn
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">TP.HCM</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>

                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">
                                            "Quy trình làm hồ sơ visa rất nhanh gọn và chuyên nghiệp. Em đậu visa thẳng ngay lần đầu! Cảm ơn Thành Công Edu đã luôn hỗ trợ em nhiệt tình."
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continue with remaining cards using the same enhanced pattern... -->
                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute -left-8 top-12 z-30"><div class="relative group/uni"><div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div><div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Kyunghee</div></div></div></div></div>
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30"><div class="relative group/visa"><div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-90 mb-0.5">💰</div><div class="text-xs leading-tight whitespace-nowrap">HỌC BỔNG<br/>50%</div></div></div></div></div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Lê Thị Mai Anh
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">Đà Nẵng</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>

                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">
                                            "Học bổng 50% học phí tại Kyunghee, em rất vui! Thành Công Edu đã tư vấn kỹ lưỡng ngành học phù hợp với em!"
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Card 4 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute -left-8 top-12 z-30"><div class="relative group/uni"><div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div><div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Sejong</div></div></div></div></div>
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30"><div class="relative group/visa"><div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-90 mb-0.5">✈️</div><div class="text-xs leading-tight whitespace-nowrap">HỆ<br/>D4-1</div></div></div></div></div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Phạm Quốc Anh
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">Hải Phòng</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>
                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">"Thành Công Edu hỗ trợ kèm cặp tận tâm. Đậu Topik 4 sau 1 năm!"</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Card 5 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute -left-8 top-12 z-30"><div class="relative group/uni"><div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div><div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Chungnam</div></div></div></div></div>
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30"><div class="relative group/visa"><div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-90 mb-0.5">✈️</div><div class="text-xs leading-tight whitespace-nowrap">HỆ<br/>D2-1</div></div></div></div></div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Hoàng Thị Lan
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">Nghệ An</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>
                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">"Thầy cô tư vấn tận tình. Mình giới thiệu nhiều bạn đến Thành Công Edu!"</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Card 6 -->
                    <div class="swiper-slide">
                        <div class="bg-gradient-to-br from-white via-blue-50/30 to-white rounded-2xl shadow-xl border-2 border-blue-100/50 overflow-hidden relative mt-20 group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                            <div class="absolute top-0 left-0 w-full h-40 overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-red-300/30 via-orange-300/25 to-yellow-300/20 rounded-full blur-3xl animate-pulse"></div>
                                <div class="absolute -top-5 -left-10 w-48 h-48 bg-gradient-to-br from-blue-300/20 to-purple-300/15 rounded-full blur-2xl"></div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-gradient-to-br from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg z-30 animate-bounce">
                                ⭐ TOP
                            </div>
                            
                            <div class="absolute -top-36 left-1/2 -translate-x-1/2 w-56 h-80 z-20">
                                <div class="absolute inset-0 bg-gradient-to-b from-blue-400/40 to-purple-400/40 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-500"></div>
                                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=400&auto=format&fit=crop" 
                                     alt="Student" 
                                     class="relative w-full h-full object-cover object-top drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute -left-8 top-12 z-30"><div class="relative group/uni"><div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-yellow-300 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-yellow-400 via-yellow-300 to-yellow-400 text-blue-900 font-black px-4 py-2 rounded-lg shadow-2xl transform -rotate-6 group-hover/uni:rotate-0 group-hover/uni:scale-110 transition-all duration-300 border-2 border-yellow-200"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/40 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-80 mb-0.5">🎓</div><div class="text-xs leading-tight whitespace-nowrap">Đại học<br/>Sungkyunkwan</div></div></div></div></div>
                                <div class="absolute -right-10 top-1/2 -translate-y-1/2 z-30"><div class="relative group/visa"><div class="absolute inset-0 bg-gradient-to-br from-kr-blue to-blue-700 blur-md opacity-70"></div><div class="relative bg-gradient-to-br from-kr-blue via-blue-700 to-kr-blue text-white font-black px-4 py-2 rounded-lg shadow-2xl transform rotate-6 group-hover/visa:rotate-0 group-hover/visa:scale-110 transition-all duration-300 border-2 border-blue-400/50"><div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/20 to-transparent rounded-lg"></div><div class="relative text-center"><div class="text-[10px] font-bold opacity-90 mb-0.5">🏆</div><div class="text-xs leading-tight whitespace-nowrap">HỌC BỔNG<br/>GKS</div></div></div></div></div>
                            </div>
                            
                            <div class="pt-48 pb-8 text-center relative z-10">
                                <h3 class="text-2xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-blue-900 bg-clip-text text-transparent uppercase tracking-wider mb-2 drop-shadow-sm">
                                    Vũ Đức Hải
                                </h3>
                                <div class="flex items-center justify-center gap-2 mb-6">
                                    <div class="h-px w-8 bg-gradient-to-r from-transparent to-red-400"></div>
                                    <p class="text-xs text-red-600 font-bold uppercase tracking-widest">Hà Nội</p>
                                    <div class="h-px w-8 bg-gradient-to-l from-transparent to-red-400"></div>
                                </div>
                                <div class="px-7 mb-4">
                                    <div class="relative">
                                        <svg class="absolute -top-2 -left-2 w-6 h-6 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 text-sm leading-relaxed italic px-4 relative">"Đậu GKS nhờ Thành Công Edu! Từ hồ sơ đến phỏng vấn đều được hỗ trợ chi tiết!"</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Đã nhập học
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Navigation Arrows -->
            <div class="testimonials-prev absolute top-1/2 left-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -ml-6 group">
                <svg class="w-6 h-6 group-hover:-translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </div>
            <div class="testimonials-next absolute top-1/2 right-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -mr-6 group">
                <svg class="w-6 h-6 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </div>


        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="#consultation-form" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span>Bạn cũng muốn có câu chuyện như vậy?</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>
<!-- Study Programs Section (Các Hệ Du Học) -->
<section class="py-16 relative overflow-hidden" data-aos="fade-up">
    <!-- Sky Background Header -->
    <div class="relative h-32 mb-12">
        <!-- Cloud Sky Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-sky-400 via-sky-300 to-sky-200"></div>
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-4 left-10 w-32 h-16 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-8 right-20 w-40 h-20 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-12 left-1/3 w-36 h-18 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-6 right-1/3 w-28 h-14 bg-white rounded-full blur-xl"></div>
        </div>

        <!-- Title -->
        <div class="relative z-10 flex items-center justify-center h-full">
            <h2 class="text-3xl md:text-4xl font-extrabold text-center">
                {!! $content['programs_title'] !!}
            </h2>
        </div>
    </div>

    <!-- Programs Grid -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Program 1: D4-1 Language -->
            <div
                class="relative bg-gradient-to-b from-gray-50 to-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 group">
                <!-- Badge Circle -->
                <div class="flex justify-center mb-6">
                    <div
                        class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-extrabold text-2xl">D4-1</span>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="text-center font-bold text-lg text-gray-900 mb-4 uppercase">
                    Du Học<br />Hệ Tiếng D4 - 1
                </h3>

                <!-- Divider -->
                <div class="w-16 h-1 bg-blue-600 mx-auto mb-4"></div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed text-center">
                    Là hình thức phổ biến cho các bạn sinh viên muốn du học Hàn Quốc. Học tập tại nhà trường tiếng sau
                    đó chuyển tiếp đến chuyên ngành D2
                </p>
            </div>

            <!-- Program 2: D2-1 Vocational -->
            <div
                class="relative bg-gradient-to-b from-gray-50 to-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 group">
                <!-- Badge Circle -->
                <div class="flex justify-center mb-6">
                    <div
                        class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-extrabold text-2xl">D2-1</span>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="text-center font-bold text-lg text-gray-900 mb-4 uppercase">
                    Du Học Nghề<br />Hệ D2 - 1
                </h3>

                <!-- Divider -->
                <div class="w-16 h-1 bg-blue-600 mx-auto mb-4"></div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed text-center">
                    Hệ du học nghề dành hợp với những bạn muốn học tập nghề và có thủ hành nghề theo kỹ năng. Sau khi
                    hoàn thành có thể xin việc và kiếm thực chuyên môn.
                </p>
            </div>

            <!-- Program 3: D2-2 Undergraduate -->
            <div
                class="relative bg-gradient-to-b from-gray-50 to-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 group">
                <!-- Badge Circle -->
                <div class="flex justify-center mb-6">
                    <div
                        class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-extrabold text-2xl">D2-2</span>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="text-center font-bold text-lg text-gray-900 mb-4 uppercase">
                    Du Học<br />Chuyên Ngành D2-2
                </h3>

                <!-- Divider -->
                <div class="w-16 h-1 bg-blue-600 mx-auto mb-4"></div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed text-center">
                    Hệ chuyên ngành dành cho những bạn đã đạt điều kiện tiếng Hàn (TOPIK 3 trở lên) và muốn theo học đại
                    học tại làm cơ sở. Nhiều chuyên ngành khác nhau và các kết nối xuất sắc.
                </p>
            </div>

            <!-- Program 4: D2-3 Master's -->
            <div
                class="relative bg-gradient-to-b from-gray-50 to-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 group">
                <!-- Badge Circle -->
                <div class="flex justify-center mb-6">
                    <div
                        class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="text-white font-extrabold text-2xl">D2-3</span>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="text-center font-bold text-lg text-gray-900 mb-4 uppercase">
                    Du Học<br />Thạc Sĩ D2-3
                </h3>

                <!-- Divider -->
                <div class="w-16 h-1 bg-blue-600 mx-auto mb-4"></div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed text-center">
                    Hệ dành cho sinh viên đã tốt nghiệp đại học tại Việt Nam hoặc nước ngoài. Chương trình xét tuyển do
                    chuyên sâu và phát triển kỹ năng học thuật.
                </p>
            </div>
        </div>

        <!-- E-VISA Badge -->
        <div class="text-center mt-12">
            <div
                class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white px-8 py-3 rounded-full shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-bold text-lg">E-VISA - Hỗ trợ làm visa điện tử nhanh chóng</span>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-8">
            <a href="#consultation-form"
                class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold transition">
                <span>Tìm hiểu thêm về các chương trình</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- Latest Articles / News Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12" data-aos="fade-up">
            <div class="mb-4 md:mb-0">
                <div class="inline-block bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full mb-3 uppercase tracking-wide">
                    📰 Blog & Tin Tức
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">
                    {!! $content['news_title'] !!}
                </h2>
                <p class="text-gray-600 max-w-2xl">
                    Cập nhật thông tin mới nhất về du học, học bổng và kinh nghiệm từ các bạn du học sinh
                </p>
            </div>
            <a href="#" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <span>Xem tất cả bài viết</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article Card 1 -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="0">
                <!-- Featured Image -->
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1578895210405-9275de0bc167?q=80&w=800&auto=format&fit=crop" 
                         alt="Visa D4-1" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-wide">
                            📘 Visa Du Học
                        </span>
                    </div>
                    
                    <!-- Date Badge -->
                    <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-md">
                        <div class="flex items-center gap-2 text-xs">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="font-semibold text-gray-700">10 Tháng 12, 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">
                        <a href="#">Visa D4-1 là gì? Điều Kiện và Thủ Tục Xin Visa Tiếng</a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                        Giải đáp chi tiết về Visa du học tiếng D4-1: Thời hạn, quyền lợi làm thêm và lộ trình chuyển đổi sang Visa chuyên ngành D2...
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Thành Công Edu&background=3b82f6&color=fff&size=32" class="w-8 h-8 rounded-full ring-2 ring-blue-100" alt="Author">
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Thành Công Edu</p>
                                <p class="text-xs text-gray-500">Tư vấn viên</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>5 phút đọc</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Article Card 2 -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="100">
                <!-- Featured Image -->
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1617374755109-1db47d3a042e?q=80&w=800&auto=format&fit=crop" 
                         alt="Học bổng GKS" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-wide">
                            🎓 Học Bổng
                        </span>
                    </div>
                    
                    <!-- Date Badge -->
                    <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-md">
                        <div class="flex items-center gap-2 text-xs">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="font-semibold text-gray-700">08 Tháng 12, 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">
                        <a href="#">Học Bổng Chính Phủ Hàn Quốc (GKS) 2025 - Cơ Hội Vàng</a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                        Tổng hợp thông tin mới nhất về học bổng GKS: Chỉ tiêu, điều kiện ứng tuyển và bí quyết làm hồ sơ săn học bổng toàn phần...
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Minh+Tuan&background=f59e0b&color=fff&size=32" class="w-8 h-8 rounded-full ring-2 ring-yellow-100" alt="Author">
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Minh Tuấn</p>
                                <p class="text-xs text-gray-500">Chuyên gia GKS</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>8 phút đọc</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Article Card 3 -->
            <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="200">
                <!-- Featured Image -->
                <div class="relative h-56 overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1661964149725-fbf14eabd38c?q=80&w=800&auto=format&fit=crop" 
                         alt="Chi phí du học" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-green-600 to-green-700 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-wide">
                            💰 Cẩm Nang
                        </span>
                    </div>
                    
                    <!-- Date Badge -->
                    <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-md">
                        <div class="flex items-center gap-2 text-xs">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="font-semibold text-gray-700">05 Tháng 12, 2024</span>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">
                        <a href="#">Chi Phí Du Học Hàn Quốc 2025 Hết Bao Nhiêu?</a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                        Bảng kê chi tiết các khoản phí: Học phí, ký túc xá, ăn uống và sinh hoạt tại Seoul vs các tỉnh khác. So sánh chi tiết...
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Thu+Ha&background=10b981&color=fff&size=32" class="w-8 h-8 rounded-full ring-2 ring-green-100" alt="Author">
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Thu Hà</p>
                                <p class="text-xs text-gray-500">Du học sinh</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-gray-500 text-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>6 phút đọc</span>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-12" data-aos="fade-up">
            <div class="inline-flex flex-col items-center gap-3">
                <p class="text-gray-600 text-sm">Muốn nhận thông tin mới nhất về du học?</p>
                <a href="#consultation-form" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span>Đăng ký nhận tư vấn miễn phí</span>
                </a>
            </div>
        </div>
    </div>
</section>

@if(isset($partners) && $partners->isNotEmpty())
<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Đối tác đào tạo</h2>
            <p class="mt-3 text-gray-600">Mạng lưới trường học và đơn vị đồng hành cùng Thành Công Edu</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach($partners as $partner)
                <a href="{{ $partner->website ?: '#' }}" class="rounded-2xl border bg-gray-50 p-5 flex flex-col items-center justify-center text-center hover:shadow-lg transition">
                    @if($partner->logo)
                        <img src="{{ filter_var($partner->logo, FILTER_VALIDATE_URL) ? $partner->logo : asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" class="h-12 object-contain mb-3">
                    @endif
                    <span class="font-bold text-sm text-gray-800">{{ $partner->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(isset($articles) && $articles->isNotEmpty())
<section class="py-16 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Bài viết mới nhất</h2>
                <p class="mt-2 text-gray-600">Nội dung được cập nhật từ dashboard quản trị</p>
            </div>
            <a href="{{ route('articles.index') }}" class="hidden md:inline-flex rounded-full bg-blue-700 px-5 py-3 text-white font-bold hover:bg-blue-800">Xem tất cả</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <article class="rounded-2xl bg-white border overflow-hidden shadow-sm hover:shadow-xl transition">
                    @if($article->thumbnail)
                        <img src="{{ filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <p class="text-xs font-bold text-blue-700 mb-2">{{ $article->category?->name }}</p>
                        <h3 class="font-extrabold text-lg leading-snug"><a href="{{ route('articles.show', $article) }}" class="hover:text-blue-700">{{ $article->title }}</a></h3>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Consultation Form -->
<section id="consultation-form" class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-blue-50 rounded-2xl p-8 md:p-12 shadow-lg flex flex-col md:flex-row gap-12 border border-blue-100">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Đăng ký tư vấn miễn phí</h2>
                <p class="text-gray-600 mb-6">
                    {{ $content['consultation_description'] }}
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Tư vấn chọn trường, chọn ngành</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Hỗ trợ săn học bổng giá trị cao</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Hướng dẫn thủ tục Visa từ A-Z</span>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2">
                <form action="{{ route('consultation.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Họ và tên" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    </div>
                    <div>
                        <input type="tel" name="phone" placeholder="Số điện thoại" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email (nếu có)" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    </div>
                    <div>
                        <select name="destination" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition text-gray-600 bg-white">
                            <option value="">Bạn quan tâm chương trình nào?</option>
                            <option value="TiengHan">Du học tiếng Hàn (D4-1)</option>
                            <option value="DaiHoc">Du học Đại học (D2-2)</option>
                            <option value="ThacSi">Du học Thạc sĩ (D2-3)</option>
                            <option value="Nghe">Du học Nghề (D4-6)</option>
                            <option value="Khac">Khác</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="message" rows="3" placeholder="Lời nhắn (Nguyện vọng của bạn...)" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 rounded-lg transition shadow-md">
                        Đăng ký ngay
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
