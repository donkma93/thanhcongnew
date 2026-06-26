@php($siteSettings = \App\Models\Setting::pluck('value', 'key'))
<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-800 flex items-center gap-2">
            <span class="bg-blue-800 text-white p-2 rounded-lg">T</span>
            {{ $siteSettings['site_name'] ?? 'Thành Công Edu' }}
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Trang chủ</a>
            <a href="#" class="hover:text-blue-600 transition">Học tiếng Hàn</a>
            <a href="#" class="hover:text-blue-600 transition">Đại học - Cao học</a>
            <a href="#" class="hover:text-blue-600 transition">Học bổng GKS</a>
            <a href="#" class="hover:text-blue-600 transition">Visa Du học</a>
            <a href="{{ route('articles.index') }}" class="hover:text-blue-600 transition">Tin tức</a>
        </nav>

        <!-- CTA Button -->
        <div class="hidden md:block">
            <a href="#consultation-form" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full font-semibold transition shadow-md">
                Đăng ký tư vấn
            </a>
        </div>

        <!-- Mobile Menu Button (Placeholder) -->
        <button class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</header>
