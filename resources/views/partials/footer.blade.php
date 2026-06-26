@php($siteSettings = \App\Models\Setting::pluck('value', 'key'))
<footer class="bg-gray-900 text-white mt-12 py-12">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h3 class="text-xl font-bold mb-4">{{ $siteSettings['site_name'] ?? 'Thành Công Edu' }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">
                Đồng hành cùng bạn trên con đường chinh phục tri thức quốc tế. Chúng tôi cung cấp dịch vụ tư vấn du học uy tín, tận tâm và chuyên nghiệp.
            </p>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">Liên kết nhanh</h3>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition">Trang chủ</a></li>
                <li><a href="#" class="hover:text-white transition">Về chúng tôi</a></li>
                <li><a href="#" class="hover:text-white transition">Học bổng mới nhất</a></li>
                <li><a href="#" class="hover:text-white transition">Điều khoản sử dụng</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">Liên hệ</h3>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>{{ $siteSettings['address'] ?? 'TP. Hồ Chí Minh, Việt Nam' }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>{{ $siteSettings['email'] ?? 'contact@thanhcongedu.vn' }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>{{ $siteSettings['hotline'] ?? '0909 123 456' }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'Thành Công Edu' }}. All rights reserved.
    </div>
</footer>
