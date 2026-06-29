@extends('admin.layouts.app')

@section('title', 'Tổng quan quản trị')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Tổng quan quản trị',
        'subtitle' => 'Theo dõi nhanh số lượng dữ liệu trong hệ thống và các đăng ký tư vấn mới cần xử lý trong ngày.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Tổng hợp module quản trị</h2>
                        <p class="card-subtitle">Hiển thị dạng bảng để dễ quét nhanh toàn bộ dữ liệu và đi thẳng tới đúng khu vực cần thao tác.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Điều hướng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ([
                                    ['Tài khoản', $counts['users'], 'fa-solid fa-users-gear', 'Đang quản lý', route('admin.users.index')],
                                    ['Slider trang chủ', $counts['sliders'], 'fa-solid fa-images', 'Đang đồng bộ', route('admin.sliders.index')],
                                    ['Thống kê trang chủ', $counts['stats'], 'fa-solid fa-chart-column', 'Đang đồng bộ', route('admin.stats.index')],
                                    ['Hệ du học', $counts['programs'], 'fa-solid fa-graduation-cap', 'Đang đồng bộ', route('admin.programs.index')],
                                    ['Danh mục', $counts['categories'], 'fa-solid fa-folder-tree', 'Đang đồng bộ', route('admin.categories.index')],
                                    ['Bài viết', $counts['articles'], 'fa-solid fa-newspaper', 'Đang đồng bộ', route('admin.articles.index')],
                                    ['Đối tác', $counts['partners'], 'fa-solid fa-handshake', 'Đang đồng bộ', route('admin.partners.index')],
                                    ['Sinh viên nói gì', $counts['testimonials'], 'fa-solid fa-comments', 'Đang đồng bộ', route('admin.testimonials.index')],
                                    ['Vinh danh học viên', $counts['achievements'], 'fa-solid fa-trophy', 'Đang đồng bộ', route('admin.achievements.index')],
                                    ['Đăng ký tư vấn', $counts['consultations'], 'fa-solid fa-headset', 'Cần theo dõi', route('admin.consultations.index')],
                                ] as [$label, $count, $icon, $status, $href])
                                    <tr>
                                        <td>
                                            <div class="table-title"><i class="{{ $icon }}" style="margin-right: 0.55rem; color: #2563eb;"></i>{{ $label }}</div>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">{{ $count }} bản ghi</span>
                                        </td>
                                        <td>{{ $status }}</td>
                                        <td>
                                            <a href="{{ $href }}" class="btn btn-default btn-sm">Mở quản lý</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Đăng ký tư vấn mới</h2>
                        <p class="card-subtitle">Danh sách lead gần nhất để đội ngũ xử lý nhanh, tránh sót liên hệ quan trọng.</p>
                    </div>
                    <a href="{{ route('admin.consultations.index') }}" class="btn btn-default btn-sm">Xem tất cả</a>
                </div>
                <div class="card-body">
                    @if ($consultations->isEmpty())
                        <div class="empty-state">Chưa có đăng ký tư vấn mới.</div>
                    @else
                        <div class="table-wrap">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Chương trình</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultations as $consultation)
                                        <tr>
                                            <td><div class="table-title">{{ $consultation->name }}</div></td>
                                            <td>{{ $consultation->phone }}</td>
                                            <td>{{ $consultation->email ?: 'Không có' }}</td>
                                            <td><span class="badge badge-info">{{ $consultation->destination ?: 'Chưa chọn' }}</span></td>
                                            <td>
                                                <div class="table-summary">
                                                    {{ \Illuminate\Support\Str::limit($consultation->message ?: 'Không có nội dung bổ sung.', 120) }}
                                                </div>
                                            </td>
                                            <td>{{ $consultation->created_at?->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
