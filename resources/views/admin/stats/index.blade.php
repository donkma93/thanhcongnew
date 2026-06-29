@extends('admin.layouts.app')

@section('title', 'Thống kê trang chủ')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Thống kê trang chủ',
        'subtitle' => 'Quản lý các con số nổi bật hiển thị ngoài trang chủ, bao gồm số liệu, tên gọi và icon tương ứng.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách thống kê</h2>
                    <p class="card-subtitle">Hiển thị dạng bảng để dễ kiểm soát số liệu, icon và thứ tự khi cần chỉnh nhiều dòng.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="stat-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm thống kê</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($stats->isEmpty())
                    <div class="empty-state">Chưa có thống kê trang chủ nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Số liệu</th>
                                    <th>Nhãn</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stats as $stat)
                                    <tr>
                                        <td>
                                            <div style="width:52px; height:52px; border-radius:999px; border:2px solid #22c55e; display:flex; align-items:center; justify-content:center; color:#22c55e; background:#f0fdf4;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width:24px; height:24px;">
                                                    {!! $stat->iconSvg() !!}
                                                </svg>
                                            </div>
                                        </td>
                                        <td><div class="table-title">{{ $stat->value }}</div></td>
                                        <td>{{ $stat->label }}</td>
                                        <td>{{ $stat->sort_order }}</td>
                                        <td>
                                            <span class="badge {{ $stat->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $stat->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-modal-open="stat-edit-modal-{{ $stat->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Sửa</span>
                                                </button>
                                                <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" onsubmit="return confirm('Xóa thống kê này?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-link-danger" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                        <span>Xóa</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        @foreach ($stats as $stat)
            <div
                id="stat-edit-modal-{{ $stat->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa thống kê</h2>
                            <p class="admin-modal-subtitle">{{ $stat->label }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.stats.update', $stat) }}" method="POST" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="form-label">Số liệu</label>
                                <input name="value" class="form-control" value="{{ $stat->value }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nhãn hiển thị</label>
                                <input name="label" class="form-control" value="{{ $stat->label }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Icon</label>
                                <select name="icon_key" class="form-select" required>
                                    @foreach ($iconOptions as $key => $label)
                                        <option value="{{ $key }}" @selected($stat->icon_key === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự hiển thị</label>
                                <input type="number" min="0" name="sort_order" class="form-control" value="{{ $stat->sort_order }}">
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" @checked($stat->is_active)>
                                    <span>Hiển thị ngoài website</span>
                                </label>
                            </div>
                            <div class="form-group form-group-full">
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Cập nhật thống kê</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="stat-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm thống kê mới</h2>
                        <p class="admin-modal-subtitle">Mỗi dòng thống kê sẽ tự động hiển thị ngoài trang chủ theo thứ tự đã chọn.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.stats.store') }}" method="POST" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="stat-value">Số liệu</label>
                            <input id="stat-value" name="value" class="form-control" value="{{ old('value') }}" placeholder="Ví dụ: 3000+" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="stat-label">Nhãn hiển thị</label>
                            <input id="stat-label" name="label" class="form-control" value="{{ old('label') }}" placeholder="Ví dụ: Số lượng học viên" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="stat-icon">Icon</label>
                            <select id="stat-icon" name="icon_key" class="form-select" required>
                                @foreach ($iconOptions as $key => $label)
                                    <option value="{{ $key }}" @selected(old('icon_key', 'users') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="stat-order">Thứ tự hiển thị</label>
                            <input id="stat-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị ngoài website</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Lưu thống kê</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
