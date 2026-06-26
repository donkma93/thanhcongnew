@extends('admin.layouts.app')

@section('title', 'Cài đặt')

@section('content')
    @php($settingMap = $settings->keyBy('key'))

    @include('admin.partials.header', [
        'title' => 'Quản trị cài đặt',
        'subtitle' => 'Cập nhật thông tin hệ thống và nội dung trang chủ trong một bộ điều khiển duy nhất.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Cài đặt hệ thống</h2>
                        <p class="card-subtitle">Thông tin liên hệ, tên website và các kênh kết nối chính.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" class="admin-form-grid">
                        @csrf
                        @foreach ([
                            'site_name' => 'Tên website',
                            'hotline' => 'Hotline',
                            'email' => 'Email',
                            'address' => 'Địa chỉ',
                            'facebook' => 'Facebook',
                            'zalo' => 'Zalo',
                        ] as $key => $label)
                            <div class="form-group">
                                <label class="form-label" for="setting-{{ $key }}">{{ $label }}</label>
                                <input
                                    id="setting-{{ $key }}"
                                    name="settings[{{ $key }}]"
                                    class="form-control"
                                    value="{{ old('settings.' . $key, $settingMap[$key]->value ?? '') }}"
                                >
                            </div>
                        @endforeach
                        <div class="form-group form-group-full">
                            <button class="btn btn-primary" type="submit">Lưu cài đặt</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Nội dung trang chủ</h2>
                        <p class="card-subtitle">Điều chỉnh các khối hero, thống kê, học bổng, chương trình và tư vấn.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.homepage.update') }}" method="POST" class="stack">
                        @csrf
                        @foreach ([
                            'hero_title' => 'Tiêu đề hero',
                            'hero_description' => 'Mô tả hero',
                            'stats_title' => 'Tiêu đề thống kê',
                            'stats_intro_1' => 'Giới thiệu 1',
                            'stats_intro_2' => 'Giới thiệu 2',
                            'stats_intro_3' => 'Giới thiệu 3',
                            'scholarship_subtitle' => 'Tiêu đề học bổng',
                            'scholarship_description' => 'Mô tả học bổng',
                            'testimonials_title' => 'Tiêu đề học viên',
                            'programs_title' => 'Tiêu đề hệ du học',
                            'news_title' => 'Tiêu đề tin tức',
                            'consultation_description' => 'Mô tả tư vấn',
                        ] as $key => $label)
                            <div class="form-group">
                                <label class="form-label" for="homepage-{{ $key }}">{{ $label }}</label>
                                <textarea
                                    id="homepage-{{ $key }}"
                                    name="{{ $key }}"
                                    rows="{{ str_contains($key, 'description') || str_contains($key, 'intro') ? 4 : 2 }}"
                                    class="form-control rich-editor"
                                >{{ old($key, $homepage[$key]) }}</textarea>
                            </div>
                        @endforeach
                        <div class="form-actions">
                            <button class="btn btn-primary" type="submit">Lưu nội dung trang chủ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
