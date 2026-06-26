<aside class="main-sidebar">
    <div class="sidebar">
        @php
            $roleLabels = [
                'admin' => 'Quản trị viên',
                'manager' => 'Quản lý',
                'editor' => 'Biên tập viên',
            ];

            $navItems = [
                ['route' => 'admin.dashboard', 'match' => 'admin.dashboard', 'icon' => 'fa-solid fa-gauge-high', 'label' => 'Tổng quan'],
                ['route' => 'admin.users.index', 'match' => 'admin.users.*', 'icon' => 'fa-solid fa-users', 'label' => 'Tài khoản'],
                ['route' => 'admin.categories.index', 'match' => 'admin.categories.*', 'icon' => 'fa-solid fa-folder-tree', 'label' => 'Danh mục'],
                ['route' => 'admin.articles.index', 'match' => 'admin.articles.*', 'icon' => 'fa-solid fa-newspaper', 'label' => 'Bài viết'],
                ['route' => 'admin.partners.index', 'match' => 'admin.partners.*', 'icon' => 'fa-solid fa-handshake', 'label' => 'Đối tác'],
                ['route' => 'admin.settings.index', 'match' => 'admin.settings.*', 'icon' => 'fa-solid fa-gears', 'label' => 'Cài đặt'],
                ['route' => 'admin.consultations.index', 'match' => 'admin.consultations.*', 'icon' => 'fa-solid fa-headset', 'label' => 'Tư vấn'],
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
                    <span class="nav-icon"><i class="{{ $item['icon'] }}"></i></span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="nav-header">Tài nguyên</div>

        <nav class="nav-sidebar">
            <a href="{{ route('home') }}" class="nav-link">
                <span class="nav-icon"><i class="fa-solid fa-globe"></i></span>
                <span>Xem website</span>
            </a>
        </nav>
    </div>
</aside>
