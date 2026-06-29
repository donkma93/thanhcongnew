@extends('admin.layouts.app')

@section('title', 'Cài đặt')

@section('content')
    @php
        $settingMap = $settings->keyBy('key');
        $siteLogo = $settingMap['site_logo']->value ?? 'mock/site-logo-thanh-cong-edu.svg';
        $siteLogoUrl = filter_var($siteLogo, FILTER_VALIDATE_URL)
            ? $siteLogo
            : (str_starts_with($siteLogo, 'mock/')
                ? asset($siteLogo)
                : asset('storage/' . $siteLogo));
    @endphp

    @include('admin.partials.header', [
        'title' => 'Quản trị cài đặt',
        'subtitle' => 'Tập trung quản lý cấu hình hệ thống và nội dung trang chủ theo dạng bảng rõ ràng, dễ rà soát hơn.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Cài đặt hệ thống</h2>
                        <p class="card-subtitle">Thông tin liên hệ, tên website, logo và các kênh kết nối chính của thương hiệu.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-wrap">
                            <table class="form-table">
                                <tbody>
                                    @foreach ([
                                        'site_name' => 'Tên website',
                                        'hotline' => 'Hotline',
                                        'email' => 'Email',
                                        'address' => 'Địa chỉ',
                                        'facebook' => 'Facebook',
                                        'zalo' => 'Zalo',
                                    ] as $key => $label)
                                        <tr>
                                            <th scope="row">{{ $label }}</th>
                                            <td>
                                                <input
                                                    id="setting-{{ $key }}"
                                                    name="settings[{{ $key }}]"
                                                    class="form-control"
                                                    value="{{ old('settings.' . $key, $settingMap[$key]->value ?? '') }}"
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row">Logo website</th>
                                        <td>
                                            <input
                                                id="setting-site-logo"
                                                type="file"
                                                name="site_logo"
                                                accept=".jpg,.jpeg,.png,.webp,.svg,image/*"
                                                class="form-control"
                                            >
                                            <div style="margin-top: 0.85rem; display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                                                <img
                                                    src="{{ $siteLogoUrl }}"
                                                    alt="Logo website"
                                                    style="width: 76px; height: 76px; border-radius: 18px; object-fit: cover; border: 1px solid #dbe3f0; background: #ffffff; padding: 0.35rem; box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);"
                                                >
                                                <div class="form-table-note">
                                                    Logo này đang hiển thị ở đầu trang ngoài.
                                                    <br>
                                                    Nếu chưa tải logo thật, hệ thống sẽ dùng logo mock tạm cho bạn.
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions" style="margin-top: 1rem;">
                            <button class="btn btn-primary" type="submit">Lưu cài đặt hệ thống</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Nội dung tĩnh trang chủ</h2>
                        <p class="card-subtitle">Các khối động đã có module CRUD riêng. Phần này chỉ giữ các tiêu đề, mô tả và CTA đơn lẻ.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.homepage.update') }}" method="POST">
                        @csrf
                        <div class="table-wrap">
                            <table class="form-table">
                                <tbody>
                                    @foreach ([
                                        'hero_title' => 'Tiêu đề hero',
                                        'hero_description' => 'Mô tả hero',
                                        'stats_title' => 'Tiêu đề thống kê',
                                        'stats_intro_1' => 'Giới thiệu 1',
                                        'stats_intro_2' => 'Giới thiệu 2',
                                        'stats_intro_3' => 'Giới thiệu 3',
                                        'stats_cta_text' => 'Nút thống kê',
                                        'stats_cta_link' => 'Liên kết nút thống kê',
                                        'scholarship_badge_title' => 'Tiêu đề khối học bổng',
                                        'scholarship_subtitle' => 'Phụ đề khối học bổng',
                                        'scholarship_description' => 'Mô tả khối học bổng',
                                        'scholarship_logo_text' => 'Chữ logo khối học bổng',
                                        'scholarship_feature_image' => 'Ảnh nổi bật học bổng',
                                        'scholarship_badge_label_1' => 'Nhãn badge 1',
                                        'scholarship_badge_value_1' => 'Giá trị badge 1',
                                        'scholarship_badge_caption_1' => 'Ghi chú badge 1',
                                        'scholarship_badge_label_2' => 'Nhãn badge 2',
                                        'scholarship_badge_value_2' => 'Giá trị badge 2',
                                        'scholarship_badge_caption_2' => 'Ghi chú badge 2',
                                        'scholarship_badge_label_3' => 'Nhãn badge 3',
                                        'scholarship_badge_value_3' => 'Giá trị badge 3',
                                        'scholarship_badge_caption_3' => 'Ghi chú badge 3',
                                        'scholarship_cta_text' => 'Nút học bổng',
                                        'scholarship_cta_link' => 'Liên kết nút học bổng',
                                        'achievements_title' => 'Tiêu đề vinh danh',
                                        'achievements_subtitle' => 'Mô tả vinh danh',
                                        'testimonials_title' => 'Tiêu đề cảm nhận học viên',
                                        'programs_title' => 'Tiêu đề hệ du học',
                                        'programs_badge_text' => 'Badge hệ du học',
                                        'programs_cta_text' => 'Nút hệ du học',
                                        'programs_cta_link' => 'Liên kết nút hệ du học',
                                        'news_title' => 'Tiêu đề tin tức',
                                        'news_subtitle' => 'Mô tả tin tức',
                                        'news_cta_text' => 'Nút tin tức',
                                        'consultation_description' => 'Mô tả tư vấn',
                                        'consultation_benefit_1' => 'Lợi ích tư vấn 1',
                                        'consultation_benefit_2' => 'Lợi ích tư vấn 2',
                                        'consultation_benefit_3' => 'Lợi ích tư vấn 3',
                                    ] as $key => $label)
                                        <tr>
                                            <th scope="row">{{ $label }}</th>
                                            <td>
                                                <textarea
                                                    id="homepage-{{ $key }}"
                                                    name="{{ $key }}"
                                                    rows="{{ str_contains($key, 'description') || str_contains($key, 'intro') ? 4 : 2 }}"
                                                    class="form-control rich-editor"
                                                >{{ old($key, $homepage[$key] ?? '') }}</textarea>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions" style="margin-top: 1rem;">
                            <button class="btn btn-primary" type="submit">Lưu nội dung trang chủ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
