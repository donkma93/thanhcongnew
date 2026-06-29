<aside class="main-sidebar">
    <div class="sidebar">
        @php
            $roleLabels = [
                'admin' => 'Quản trị viên',
                'manager' => 'Quản lý',
                'editor' => 'Biên tập viên',
            ];

            $navItems = [
                [
                    'route' => 'admin.dashboard',
                    'match' => 'admin.dashboard',
                    'label' => 'Tổng quan',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="2"></rect><rect x="13" y="3" width="8" height="5" rx="2"></rect><rect x="13" y="10" width="8" height="11" rx="2"></rect><rect x="3" y="13" width="8" height="8" rx="2"></rect></svg>',
                ],
                [
                    'route' => 'admin.users.index',
                    'match' => 'admin.users.*',
                    'label' => 'Tài khoản',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"></path><circle cx="9.5" cy="7" r="4"></circle><path d="M20 8v6"></path><path d="M23 11h-6"></path></svg>',
                ],
                [
                    'route' => 'admin.sliders.index',
                    'match' => 'admin.sliders.*',
                    'label' => 'Slider trang chủ',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m8 13 2.5-2.5L14 14l2.5-2.5L21 16"></path><circle cx="9" cy="9" r="1.3"></circle></svg>',
                ],
                [
                    'route' => 'admin.stats.index',
                    'match' => 'admin.stats.*',
                    'label' => 'Thống kê trang chủ',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20h16"></path><path d="M7 16V9"></path><path d="M12 16V5"></path><path d="M17 16v-4"></path></svg>',
                ],
                [
                    'route' => 'admin.programs.index',
                    'match' => 'admin.programs.*',
                    'label' => 'Hệ du học',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3 3 7.5 12 12l9-4.5L12 3Z"></path><path d="M6 10.5V15l6 3 6-3v-4.5"></path></svg>',
                ],
                [
                    'route' => 'admin.categories.index',
                    'match' => 'admin.categories.*',
                    'label' => 'Danh mục',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"></path></svg>',
                ],
                [
                    'route' => 'admin.articles.index',
                    'match' => 'admin.articles.*',
                    'label' => 'Bài viết',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h11a2 2 0 0 1 2 2v14l-4-2-4 2-4-2-4 2V6a2 2 0 0 1 2-2h1"></path><path d="M8 8h8"></path><path d="M8 12h8"></path><path d="M8 16h5"></path></svg>',
                ],
                [
                    'route' => 'admin.partners.index',
                    'match' => 'admin.partners.*',
                    'label' => 'Đối tác',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m8 12-3-3a2.8 2.8 0 1 1 4-4l3 3"></path><path d="m16 12 3 3a2.8 2.8 0 1 1-4 4l-3-3"></path><path d="m9 15 6-6"></path></svg>',
                ],
                [
                    'route' => 'admin.testimonials.index',
                    'match' => 'admin.testimonials.*',
                    'label' => 'Sinh viên nói gì',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><path d="M8 9h8"></path><path d="M8 13h5"></path></svg>',
                ],
                [
                    'route' => 'admin.achievements.index',
                    'match' => 'admin.achievements.*',
                    'label' => 'Vinh danh học viên',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 17 8.5 19l.8-4.1-3-2.7 4.2-.5L12 8l1.5 3.7 4.2.5-3 2.7.8 4.1L12 17Z"></path><path d="M7 5H4v3a3 3 0 0 0 3 3"></path><path d="M17 11a3 3 0 0 0 3-3V5h-3"></path></svg>',
                ],
                [
                    'route' => 'admin.settings.index',
                    'match' => 'admin.settings.*',
                    'label' => 'Cài đặt',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.01A1.65 1.65 0 0 0 10 3.09V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.01a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.01a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z"></path></svg>',
                ],
                [
                    'route' => 'admin.consultations.index',
                    'match' => 'admin.consultations.*',
                    'label' => 'Tư vấn',
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><path d="M8 9h8"></path><path d="M8 13h5"></path></svg>',
                ],
            ];
        @endphp

        <div class="user-panel">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div>
                <div style="font-weight: 700;">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">
                    {{ $roleLabels[auth()->user()->role ?? ''] ?? 'Quản trị' }}
                </div>
            </div>
        </div>

        <div class="nav-header">Điều hướng</div>

        <nav class="nav-sidebar">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['match']) ? 'active' : '' }}">
                    <span class="nav-icon">{!! $item['svg'] !!}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="nav-header">Tài nguyên</div>

        <nav class="nav-sidebar">
            <a href="{{ route('home') }}" class="nav-link">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M3 12h18"></path>
                        <path d="M12 3a15 15 0 0 1 0 18"></path>
                        <path d="M12 3a15 15 0 0 0 0 18"></path>
                    </svg>
                </span>
                <span>Xem website</span>
            </a>
        </nav>
    </div>
</aside>
