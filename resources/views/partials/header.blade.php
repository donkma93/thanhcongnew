@php
    $siteSettings = \App\Models\Setting::pluck('value', 'key');
    $siteLogo = $siteSettings['site_logo'] ?? 'mock/site-logo-thanh-cong-edu.svg';
    $siteLogoUrl = filter_var($siteLogo, FILTER_VALIDATE_URL)
        ? $siteLogo
        : (str_starts_with($siteLogo, 'mock/')
            ? asset($siteLogo)
            : asset('storage/' . $siteLogo));

    $navigationItems = [
        [
            'label' => 'Trang chủ',
            'url' => route('home'),
            'active' => request()->routeIs('home'),
        ],
        [
            'label' => 'Học tiếng Hàn',
            'url' => route('articles.index', ['category' => 'cam-nang-du-hoc']),
            'active' => request('category') === 'cam-nang-du-hoc',
        ],
        [
            'label' => 'Đại học - Cao học',
            'url' => route('articles.index', ['category' => 'truong-hoc-han-quoc']),
            'active' => request('category') === 'truong-hoc-han-quoc',
        ],
        [
            'label' => 'Học bổng GKS',
            'url' => route('articles.index', ['category' => 'hoc-bong-han-quoc']),
            'active' => request('category') === 'hoc-bong-han-quoc',
        ],
        [
            'label' => 'Visa Du học',
            'url' => route('articles.index', ['category' => 'visa-du-hoc']),
            'active' => request('category') === 'visa-du-hoc',
        ],
        [
            'label' => 'Tin tức',
            'url' => route('articles.index'),
            'active' => request()->routeIs('articles.*') && ! request('category'),
        ],
    ];
@endphp

<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center gap-6">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-800 flex items-center gap-3 shrink-0">
            <img
                src="{{ $siteLogoUrl }}"
                alt="{{ $siteSettings['site_name'] ?? 'Thành Công Edu' }}"
                class="h-12 w-12 rounded-xl object-cover shadow-sm"
            >
            <span>{{ $siteSettings['site_name'] ?? 'Thành Công Edu' }}</span>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            @foreach ($navigationItems as $item)
                <a href="{{ $item['url'] }}" class="transition {{ $item['active'] ? 'text-blue-700 font-bold' : 'hover:text-blue-600' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden md:block shrink-0">
            <a href="{{ route('home') }}#consultation-form" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full font-semibold transition shadow-md">
                Đăng ký tư vấn
            </a>
        </div>

        <details class="md:hidden relative">
            <summary class="list-none cursor-pointer text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </summary>
            <div class="absolute right-0 mt-3 w-72 rounded-2xl border bg-white shadow-xl p-4 space-y-2">
                @foreach ($navigationItems as $item)
                    <a href="{{ $item['url'] }}" class="block rounded-xl px-4 py-3 {{ $item['active'] ? 'bg-blue-700 text-white font-bold' : 'bg-gray-50 text-gray-700' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('home') }}#consultation-form" class="mt-2 block rounded-xl bg-orange-500 px-4 py-3 text-center font-bold text-white">
                    Đăng ký tư vấn
                </a>
            </div>
        </details>
    </div>
</header>
