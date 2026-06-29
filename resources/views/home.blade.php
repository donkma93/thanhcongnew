@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<section class="relative overflow-hidden group h-[600px]">
    <div class="swiper hero-swiper h-full">
        <div class="swiper-wrapper">
            @forelse ($sliders as $slider)
                <div class="swiper-slide relative">
                    <div
                        class="absolute inset-0 bg-cover bg-center"
                        style="background-image: url('{{ $slider->background_image ? (filter_var($slider->background_image, FILTER_VALIDATE_URL) ? $slider->background_image : asset('storage/' . $slider->background_image)) : asset('storage/mock/sliders/hero-campus.svg') }}');"
                    ></div>
                    <div class="absolute inset-0 {{ $slider->overlay_class }}"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                        <div class="max-w-4xl" data-aos="fade-up">
                            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-md">
                                {!! $slider->title !!}
                            </h1>
                            @if ($slider->description)
                                <p class="text-xl md:text-2xl text-blue-100 mb-10 drop-shadow-sm">
                                    {{ $slider->description }}
                                </p>
                            @endif
                            @if ($slider->button_text)
                                <div class="flex flex-col md:flex-row justify-center gap-4">
                                    <a href="{{ $slider->button_link ?: '#consultation-form' }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-bold text-lg transition shadow-lg transform hover:scale-105 hover:-translate-y-1">
                                        {{ $slider->button_text }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/mock/sliders/hero-campus.svg') }}');"></div>
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
            @endforelse
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next text-white hover:text-orange-500 transition"></div>
        <div class="swiper-button-prev text-white hover:text-orange-500 transition"></div>
    </div>
</section>

<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2">
                <div class="grid grid-cols-2 gap-8 text-center">
                    @forelse ($stats as $stat)
                        <div class="flex flex-col items-center group">
                            <div class="w-24 h-24 rounded-full border-2 border-green-500 flex items-center justify-center mb-4 group-hover:bg-green-50 transition duration-300">
                                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $stat->iconSvg() !!}
                                </svg>
                            </div>
                            <div class="text-3xl font-extrabold text-red-600 mb-1">{{ $stat->value }}</div>
                            <div class="text-gray-700 font-medium">{{ $stat->label }}</div>
                        </div>
                    @empty
                        <div class="col-span-2 rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-8 text-center text-gray-500">
                            Chưa có dữ liệu thống kê. Hãy thêm trong mục quản trị "Thống kê trang chủ".
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                    {!! $content['stats_title'] !!}
                </h2>
                <div class="space-y-4 text-gray-600 font-medium text-lg leading-relaxed text-justify">
                    <p>{!! $content['stats_intro_1'] !!}</p>
                    <p>{{ $content['stats_intro_2'] }}</p>
                    <p>{{ $content['stats_intro_3'] }}</p>
                </div>
                <div class="mt-8">
                    <a href="{{ $content['stats_cta_link'] }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 hover:underline text-lg transition">
                        {{ $content['stats_cta_text'] }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white relative overflow-hidden" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12 items-start">
            <div class="lg:w-2/5 space-y-6">
                <div>
                    <h2 class="text-4xl font-extrabold text-blue-900 leading-snug mb-1">
                        {{ $content['scholarship_badge_title'] }}
                    </h2>
                    <p class="text-2xl font-light text-blue-600">
                        {{ $content['scholarship_subtitle'] }}
                    </p>
                </div>

                <div class="relative w-full h-96 max-w-md bg-gradient-to-br from-gray-50 to-white rounded-2xl p-4 shadow-lg">
                    <div class="absolute -top-6 left-6 bg-white shadow-xl rounded-lg px-5 py-4 transform -rotate-3 z-30 border border-gray-100">
                        <div class="text-2xl md:text-3xl font-black tracking-tight text-blue-900">
                            {{ $content['scholarship_logo_text'] }}
                        </div>
                    </div>

                    <div class="relative z-10 mt-8">
                        <img
                            src="{{ $content['scholarship_feature_image'] ? (filter_var($content['scholarship_feature_image'], FILTER_VALIDATE_URL) ? $content['scholarship_feature_image'] : asset('storage/' . $content['scholarship_feature_image'])) : asset('storage/mock/scholarship/feature.svg') }}"
                            alt="Học bổng nổi bật"
                            class="w-full h-72 object-cover rounded-lg shadow-md"
                        >
                    </div>

                    <div class="absolute top-16 right-4 bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-md shadow-lg z-20 transform rotate-2">
                        <div class="text-xs">{{ $content['scholarship_badge_label_1'] }}</div>
                        <div class="text-2xl font-extrabold">{{ $content['scholarship_badge_value_1'] }}</div>
                        <div class="text-xs">{{ $content['scholarship_badge_caption_1'] }}</div>
                    </div>

                    <div class="absolute bottom-32 -left-4 bg-orange-400 text-white font-bold px-4 py-2 rounded-md shadow-lg z-20 transform -rotate-3">
                        <div class="text-xs">{{ $content['scholarship_badge_label_2'] }}</div>
                        <div class="text-2xl font-extrabold">{{ $content['scholarship_badge_value_2'] }}</div>
                        @if ($content['scholarship_badge_caption_2'])
                            <div class="text-xs">{{ $content['scholarship_badge_caption_2'] }}</div>
                        @endif
                    </div>

                    <div class="absolute bottom-48 right-8 bg-gradient-to-r from-yellow-300 to-orange-300 text-blue-900 font-bold px-3 py-1.5 rounded-md shadow-md z-20 text-sm">
                        {{ $content['scholarship_badge_label_3'] }} <span class="text-lg">{{ $content['scholarship_badge_value_3'] }}</span>
                        @if ($content['scholarship_badge_caption_3'])
                            <span class="text-xs">{{ $content['scholarship_badge_caption_3'] }}</span>
                        @endif
                    </div>

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

            <div class="lg:w-3/5 space-y-6">
                <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <p class="text-gray-600 leading-relaxed text-justify flex-1 text-sm md:text-base">
                        {{ $content['scholarship_description'] }}
                    </p>

                    <div class="flex gap-3 flex-shrink-0">
                        <button class="scholarship-prev w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button class="scholarship-next w-12 h-12 rounded-full bg-blue-800 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>

                @if ($scholarships->isNotEmpty())
                    <div class="swiper scholarship-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($scholarships as $article)
                                <div class="swiper-slide">
                                    <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group h-full">
                                        <div class="relative h-44 overflow-hidden">
                                            <img
                                                src="{{ $article->thumbnail ? (filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail)) : asset('storage/mock/articles/top-hoc-bong.svg') }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                                alt="{{ $article->title }}"
                                            >
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                            <div class="absolute bottom-3 left-3">
                                                <span class="bg-blue-700 text-white text-xs font-bold px-3 py-1 rounded-full shadow uppercase">
                                                    {{ $article->category?->name ?: 'Học bổng' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <h3 class="font-bold text-base text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-blue-600 transition">
                                                {{ $article->title }}
                                            </h3>
                                            <p class="text-xs text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                                {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}
                                            </p>
                                            <div class="flex justify-between items-center text-xs border-t border-gray-100 pt-3 gap-3">
                                                <span class="text-gray-400">{{ optional($article->published_at)->format('d.m.Y') }}</span>
                                                <a href="{{ route('articles.show', $article) }}" class="text-blue-600 font-semibold hover:underline">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="rounded-3xl border border-dashed border-blue-200 bg-blue-50/60 p-8 text-center text-blue-900">
                        Chưa có bài viết học bổng nào. Hãy đánh dấu bài viết là "Học bổng" trong quản trị để hiển thị tại đây.
                    </div>
                @endif

                <div class="pt-2">
                    <a href="{{ $content['scholarship_cta_link'] }}" class="inline-flex items-center gap-2 text-blue-700 font-semibold hover:text-blue-900 transition">
                        <span>{{ $content['scholarship_cta_text'] }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-br from-blue-50 via-white to-purple-50 relative overflow-hidden" data-aos="fade-up">
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-3 uppercase">
                {!! $content['testimonials_title'] !!}
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Những học viên tiêu biểu đã và đang đồng hành cùng Thành Công Edu trên hành trình chinh phục mục tiêu du học Hàn Quốc.
            </p>
        </div>

        @if ($testimonials->isNotEmpty())
            <div class="relative">
                <div class="swiper testimonials-swiper pb-12">
                    <div class="swiper-wrapper pt-16 pb-8">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="bg-white/95 rounded-[28px] shadow-xl border border-blue-100/80 overflow-hidden relative group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 h-full">
                                    <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-r from-blue-50 via-white to-orange-50"></div>
                                    <div class="absolute -top-10 right-[-2.5rem] h-40 w-40 rounded-full bg-blue-100/40 blur-3xl"></div>

                                    <div class="relative z-10 flex flex-col h-full p-6 md:p-7">
                                        <div class="flex items-start gap-4 pr-20">
                                            <div class="shrink-0">
                                                @if ($testimonial->avatar)
                                                    <img
                                                        src="{{ filter_var($testimonial->avatar, FILTER_VALIDATE_URL) ? $testimonial->avatar : asset('storage/' . $testimonial->avatar) }}"
                                                        alt="{{ $testimonial->student_name }}"
                                                        class="h-20 w-20 rounded-3xl object-cover border-4 border-white shadow-lg"
                                                    >
                                                @else
                                                    <div class="h-20 w-20 rounded-3xl bg-gradient-to-br from-blue-600 to-blue-800 text-white flex items-center justify-center text-3xl font-black border-4 border-white shadow-lg">
                                                        {{ strtoupper(mb_substr($testimonial->student_name, 0, 1)) }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0 flex-1 pt-1">
                                                <h3 class="text-xl md:text-2xl font-black text-blue-800 leading-tight break-words">
                                                    {{ $testimonial->student_name }}
                                                </h3>
                                                <div class="mt-2 inline-flex items-center rounded-full bg-red-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-red-600">
                                                    {{ $testimonial->course_name }}
                                                </div>
                                                <div class="mt-3 flex items-center gap-1 text-amber-400">
                                                    @for ($star = 1; $star <= 5; $star++)
                                                        <svg class="w-4 h-4 {{ $star <= $testimonial->rating ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292Z"></path>
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        <div class="absolute right-6 top-6 rounded-full bg-gradient-to-r from-amber-400 to-orange-400 px-3 py-1.5 text-xs font-bold text-white shadow-lg">
                                            {{ $testimonial->rating }}/5 sao
                                        </div>

                                        <div class="relative mt-6 flex-1 rounded-3xl bg-slate-50/80 px-5 py-5">
                                            <svg class="absolute left-4 top-3 h-8 w-8 text-blue-100" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                            </svg>
                                            <p class="relative pl-7 text-[15px] leading-7 text-slate-600 italic">
                                                "{{ $testimonial->content }}"
                                            </p>
                                        </div>

                                        <div class="mt-5 flex items-center justify-between gap-3 flex-wrap">
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700 border border-green-200">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Học viên nổi bật
                                            </span>
                                            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
                                                Thành Công Edu
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                <div class="testimonials-prev absolute top-1/2 left-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -ml-6 group">
                    <svg class="w-6 h-6 group-hover:-translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </div>
                <div class="testimonials-next absolute top-1/2 right-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -mr-6 group">
                    <svg class="w-6 h-6 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>
        @else
            <div class="max-w-3xl mx-auto bg-white/90 border border-blue-100 rounded-3xl shadow-xl p-10 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 text-blue-700 flex items-center justify-center mb-5">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M7 4h10a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-4l-4 4v-4H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3Z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-extrabold text-blue-900 mb-3">Chưa có cảm nhận học viên</h3>
                <p class="text-gray-600 leading-relaxed">
                    Hãy thêm các đánh giá thực tế từ khu vực quản trị ở phần “Sinh viên nói gì về chúng tôi” để hiển thị sống động và tăng độ tin cậy cho website.
                </p>
            </div>
        @endif

        <div class="text-center mt-12">
            <a href="#consultation-form" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span>Bạn cũng muốn có câu chuyện như vậy?</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-8 mb-10">
            <div class="max-w-3xl">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                    {!! $content['achievements_title'] !!}
                </h2>
                <p class="mt-4 text-lg text-slate-600 leading-relaxed">
                    {{ $content['achievements_subtitle'] }}
                </p>
            </div>
            <a href="#consultation-form" class="inline-flex items-center gap-2 rounded-full bg-blue-700 px-6 py-3 text-white font-bold hover:bg-blue-800 transition">
                Trở thành học viên tiếp theo
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        @if ($achievements->isNotEmpty())
            <div class="relative">
                <div class="swiper achievements-swiper pb-12">
                    <div class="swiper-wrapper items-stretch pt-4 pb-8">
                        @foreach ($achievements as $achievement)
                            <div class="swiper-slide flex h-auto">
                                <article class="group h-[420px] w-full overflow-hidden rounded-[30px] border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-orange-50 shadow-sm hover:shadow-2xl transition-all duration-500">
                                    <div class="p-6 md:p-7 h-full flex flex-col">
                                        <div class="flex h-[130px] items-start gap-4">
                                            <div class="shrink-0">
                                                @if ($achievement->avatar)
                                                    <img
                                                        src="{{ filter_var($achievement->avatar, FILTER_VALIDATE_URL) ? $achievement->avatar : asset('storage/' . $achievement->avatar) }}"
                                                        alt="{{ $achievement->student_name }}"
                                                        class="h-20 w-20 rounded-3xl object-cover border-4 border-white shadow-lg"
                                                    >
                                                @else
                                                    <div class="h-20 w-20 rounded-3xl bg-gradient-to-br from-blue-700 to-blue-900 text-white flex items-center justify-center text-3xl font-black border-4 border-white shadow-lg">
                                                        {{ strtoupper(mb_substr($achievement->student_name, 0, 1)) }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0 flex-1 flex h-full flex-col">
                                                <p class="inline-flex self-start rounded-full bg-blue-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-blue-700">
                                                    {{ $achievement->program_name }}
                                                </p>
                                                <h3 class="mt-3 min-h-[64px] text-2xl font-black leading-tight text-slate-900 line-clamp-2">
                                                    {{ $achievement->student_name }}
                                                </h3>
                                                <div class="mt-auto h-[40px]">
                                                    @if ($achievement->result_badge)
                                                        <div class="inline-flex items-center gap-2 rounded-full bg-orange-500 px-4 py-2 text-sm font-bold text-white shadow-md">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292Z"></path>
                                                            </svg>
                                                            {{ $achievement->result_badge }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-6 h-[200px] rounded-3xl bg-white/90 p-5 shadow-inner border border-slate-100 flex flex-col overflow-hidden">
                                            <h4 class="h-[56px] text-lg font-extrabold text-slate-900 line-clamp-2">{{ $achievement->achievement_title }}</h4>
                                            <p class="mt-3 flex-1 overflow-hidden text-sm leading-7 text-slate-600 line-clamp-4">
                                                {{ $achievement->achievement_description }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div class="achievements-pagination swiper-pagination"></div>
                </div>

                <div class="achievements-prev absolute top-1/2 left-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -ml-6 group">
                    <svg class="w-6 h-6 group-hover:-translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </div>
                <div class="achievements-next absolute top-1/2 right-0 -translate-y-1/2 z-30 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center cursor-pointer text-blue-800 transition -mr-6 group">
                    <svg class="w-6 h-6 group-hover:translate-x-0.5 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>
        @else
            <div class="rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center text-gray-500">
                Chưa có học viên vinh danh nào. Hãy thêm từ khu vực quản trị để hiển thị tại đây.
            </div>
        @endif
    </div>
</section>

<section class="py-16 relative overflow-hidden" data-aos="fade-up">
    <div class="relative h-32 mb-12">
        <div class="absolute inset-0 bg-gradient-to-b from-sky-400 via-sky-300 to-sky-200"></div>
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-4 left-10 w-32 h-16 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-8 right-20 w-40 h-20 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-12 left-1/3 w-36 h-18 bg-white rounded-full blur-xl"></div>
            <div class="absolute top-6 right-1/3 w-28 h-14 bg-white rounded-full blur-xl"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h2 class="text-3xl md:text-4xl font-extrabold text-center">
                {!! $content['programs_title'] !!}
            </h2>
        </div>
    </div>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($programs as $program)
                @php($theme = $program->theme())
                <div class="relative bg-gradient-to-b {{ $theme['ring'] }} rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 {{ $theme['border'] }} group">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 rounded-full {{ $theme['badge'] }} flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-extrabold text-2xl">{{ $program->code }}</span>
                        </div>
                    </div>

                    <h3 class="text-center font-bold text-lg text-gray-900 mb-4 uppercase">
                        {{ $program->title }}
                    </h3>

                    <div class="w-16 h-1 {{ $theme['badge'] }} mx-auto mb-4"></div>

                    <p class="text-gray-600 text-sm leading-relaxed text-center">
                        {{ $program->description }}
                    </p>
                </div>
            @empty
                <div class="lg:col-span-4 rounded-3xl border border-dashed border-sky-200 bg-sky-50/70 p-8 text-center text-sky-900">
                    Chưa có hệ du học nào. Hãy thêm dữ liệu trong quản trị để hiển thị tại đây.
                </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white px-8 py-3 rounded-full shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-bold text-lg">{{ $content['programs_badge_text'] }}</span>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ $content['programs_cta_link'] }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold transition">
                <span>{{ $content['programs_cta_text'] }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

@if ($partners->isNotEmpty())
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Đối tác đào tạo</h2>
                <p class="mt-3 text-gray-600">Mạng lưới trường học và đơn vị đồng hành cùng Thành Công Edu</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
                @foreach ($partners as $partner)
                    <a href="{{ $partner->website ?: '#' }}" class="rounded-2xl border bg-gray-50 p-5 flex flex-col items-center justify-center text-center hover:shadow-lg transition">
                        @if ($partner->logo)
                            <img src="{{ filter_var($partner->logo, FILTER_VALIDATE_URL) ? $partner->logo : asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-12 object-contain mb-3">
                        @endif
                        <span class="font-bold text-sm text-gray-800">{{ $partner->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

@if ($articles->isNotEmpty())
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden" data-aos="fade-up" id="news-section">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
                <div>
                    <div class="inline-block bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full mb-3 uppercase tracking-wide">
                        Bài viết mới
                    </div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">
                        {!! $content['news_title'] !!}
                    </h2>
                    <p class="text-gray-600 max-w-2xl">
                        {{ $content['news_subtitle'] }}
                    </p>
                </div>
                <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <span>{{ $content['news_cta_text'] }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 group">
                        <div class="relative h-56 overflow-hidden">
                            <img
                                src="{{ $article->thumbnail ? (filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail)) : asset('storage/mock/articles/visa-d4-1.svg') }}"
                                alt="{{ $article->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-wide">
                                    {{ $article->category?->name ?: 'Tin tức' }}
                                </span>
                            </div>
                            <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-md">
                                <div class="flex items-center gap-2 text-xs">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="font-semibold text-gray-700">{{ optional($article->published_at)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">
                                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 150) }}
                            </p>

                            <div class="flex items-center justify-between border-t border-gray-100 pt-4 gap-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold">
                                        TC
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">{{ $settings['site_name'] ?? 'Thành Công Edu' }}</p>
                                        <p class="text-xs text-gray-500">Ban biên tập</p>
                                    </div>
                                </div>
                                <a href="{{ route('articles.show', $article) }}" class="text-blue-600 font-semibold text-sm hover:underline">Đọc tiếp</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<section id="consultation-form" class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-blue-50 rounded-2xl p-8 md:p-12 shadow-lg flex flex-col md:flex-row gap-12 border border-blue-100">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Đăng ký tư vấn miễn phí</h2>
                <p class="text-gray-600 mb-6">
                    {{ $content['consultation_description'] }}
                </p>
                <div class="space-y-4">
                    @foreach ([
                        $content['consultation_benefit_1'],
                        $content['consultation_benefit_2'],
                        $content['consultation_benefit_3'],
                    ] as $benefit)
                        <div class="flex items-center gap-3 text-gray-700">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $benefit }}</span>
                        </div>
                    @endforeach
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
                            <option value="Nghe">Du học nghề (D4-6)</option>
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
