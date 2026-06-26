@extends('admin.layouts.app')

@section('title', 'Dashboard quản trị')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Tổng quan quản trị',
        'subtitle' => 'Thống kê nhanh toàn bộ hệ thống và các đăng ký tư vấn mới nhất để xử lý trong ngày.',
    ])

    <section class="content">
        <div class="grid grid-5">
            @foreach ([
                ['Tài khoản', $counts['users'], 'fa-solid fa-users', 'bg-primary', route('admin.users.index')],
                ['Danh mục', $counts['categories'], 'fa-solid fa-folder-tree', 'bg-success', route('admin.categories.index')],
                ['Bài viết', $counts['articles'], 'fa-solid fa-newspaper', 'bg-warning', route('admin.articles.index')],
                ['Đối tác', $counts['partners'], 'fa-solid fa-handshake', 'bg-danger', route('admin.partners.index')],
                ['Tư vấn', $counts['consultations'], 'fa-solid fa-headset', 'bg-info', route('admin.consultations.index')],
            ] as [$label, $count, $icon, $color, $href])
                <a href="{{ $href }}" class="small-box {{ $color }}">
                    <div class="inner">
                        <h3>{{ $count }}</h3>
                        <p>{{ $label }}</p>
                    </div>
                    <div class="icon"><i class="{{ $icon }}"></i></div>
                    <div class="small-box-footer">
                        <span>Mở chi tiết</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="grid grid-3" style="margin-top: 1rem;">
            <a href="{{ route('admin.users.index') }}" class="quick-link">
                <p class="quick-link-title">Quản lý tài khoản</p>
                <p class="quick-link-copy">Tạo mới, phân quyền và kiểm soát trạng thái kích hoạt của người dùng.</p>
            </a>
            <a href="{{ route('admin.articles.index') }}" class="quick-link">
                <p class="quick-link-title">Quản lý bài viết</p>
                <p class="quick-link-copy">Đăng bài, cập nhật nội dung, ảnh đại diện và điều hướng danh mục nhanh hơn.</p>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="quick-link">
                <p class="quick-link-title">Cấu hình hệ thống</p>
                <p class="quick-link-copy">Điều chỉnh thông tin website và nội dung trang chủ từ một nơi duy nhất.</p>
            </a>
        </div>

        <div class="grid grid-4" style="margin-top: 1rem;">
            <div class="info-box">
                <div class="info-box-icon bg-primary"><i class="fa-solid fa-layer-group"></i></div>
                <div class="info-box-content">
                    <span class="info-box-text">Nội dung đang hoạt động</span>
                    <span class="info-box-number">{{ $counts['articles'] + $counts['categories'] }}</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-box-icon bg-success"><i class="fa-solid fa-link"></i></div>
                <div class="info-box-content">
                    <span class="info-box-text">Liên kết đối tác</span>
                    <span class="info-box-number">{{ $counts['partners'] }}</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-box-icon bg-warning"><i class="fa-solid fa-bolt"></i></div>
                <div class="info-box-content">
                    <span class="info-box-text">Mục cần xử lý</span>
                    <span class="info-box-number">{{ $consultations->count() }}</span>
                </div>
            </div>
            <div class="info-box">
                <div class="info-box-icon bg-danger"><i class="fa-solid fa-user-shield"></i></div>
                <div class="info-box-content">
                    <span class="info-box-text">Admin đang quản lý</span>
                    <span class="info-box-number">{{ $counts['users'] }}</span>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 1rem;">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Đăng ký tư vấn mới</h2>
                    <p class="card-subtitle">Danh sách lead mới nhất để đội ngũ liên hệ và tư vấn kịp thời.</p>
                </div>
                <a href="{{ route('admin.consultations.index') }}" class="btn btn-default">
                    <i class="fa-solid fa-list"></i>
                    <span>Xem tất cả</span>
                </a>
            </div>
            <div class="card-body">
                @if ($consultations->isEmpty())
                    <div class="empty-state">Chưa có đăng ký tư vấn mới.</div>
                @else
                    <div class="grid grid-4">
                        @foreach ($consultations as $consultation)
                            <div class="entity-item">
                                <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem;">
                                    <div>
                                        <div style="font-weight: 700;">{{ $consultation->name }}</div>
                                        <div class="entity-meta">{{ $consultation->phone }}</div>
                                        <div class="entity-meta">{{ $consultation->email }}</div>
                                    </div>
                                    <span class="badge badge-info">{{ $consultation->destination }}</span>
                                </div>
                                <p class="entity-note">{{ $consultation->message ?: 'Không có ghi chú bổ sung.' }}</p>
                                <div class="entity-meta">{{ $consultation->created_at?->format('d/m/Y H:i') }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
