@extends('admin.layouts.app')

@section('title', 'Hệ du học')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Các hệ du học',
        'subtitle' => 'Quản lý toàn bộ các khối hệ du học hiển thị ngoài trang chủ, bao gồm mã hệ, tiêu đề, mô tả và màu nhận diện.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách hệ du học</h2>
                    <p class="card-subtitle">Sắp xếp, đổi màu và chỉnh nhanh từng hệ bằng bảng dữ liệu gọn gàng hơn.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="program-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm hệ du học</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($programs->isEmpty())
                    <div class="empty-state">Chưa có hệ du học nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Mã hệ</th>
                                    <th>Tên hệ</th>
                                    <th>Màu</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                    @php($theme = $program->theme())
                                    <tr>
                                        <td>
                                            <div class="{{ $theme['badge'] }}" style="width: 52px; height: 52px; border-radius: 999px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:800;">
                                                {{ $program->code }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-title">{{ $program->title }}</div>
                                            <div class="table-meta">{{ \Illuminate\Support\Str::limit($program->description, 100) }}</div>
                                        </td>
                                        <td>{{ $themeOptions[$program->theme_key] ?? 'Mặc định' }}</td>
                                        <td>{{ $program->sort_order }}</td>
                                        <td>
                                            <span class="badge {{ $program->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $program->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-modal-open="program-edit-modal-{{ $program->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Sửa</span>
                                                </button>
                                                <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Xóa hệ du học này?')">
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

        @foreach ($programs as $program)
            <div
                id="program-edit-modal-{{ $program->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa hệ du học</h2>
                            <p class="admin-modal-subtitle">{{ $program->title }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.programs.update', $program) }}" method="POST" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="form-label">Mã hệ</label>
                                <input name="code" class="form-control" value="{{ $program->code }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tên hệ</label>
                                <input name="title" class="form-control" value="{{ $program->title }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Màu nhận diện</label>
                                <select name="theme_key" class="form-select" required>
                                    @foreach ($themeOptions as $key => $label)
                                        <option value="{{ $key }}" @selected($program->theme_key === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự hiển thị</label>
                                <input type="number" min="0" name="sort_order" class="form-control" value="{{ $program->sort_order }}">
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control" rows="5" required>{{ $program->description }}</textarea>
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" @checked($program->is_active)>
                                    <span>Hiển thị ngoài website</span>
                                </label>
                            </div>
                            <div class="form-group form-group-full">
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Cập nhật hệ du học</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="program-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm hệ du học mới</h2>
                        <p class="admin-modal-subtitle">Nội dung thêm tại đây sẽ hiển thị ngay ở mục các hệ du học ngoài trang chủ.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.programs.store') }}" method="POST" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="program-code">Mã hệ</label>
                            <input id="program-code" name="code" class="form-control" value="{{ old('code') }}" placeholder="Ví dụ: D4-1" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="program-title">Tên hệ</label>
                            <input id="program-title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Ví dụ: Du học hệ tiếng D4-1" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="program-theme">Màu nhận diện</label>
                            <select id="program-theme" name="theme_key" class="form-select" required>
                                @foreach ($themeOptions as $key => $label)
                                    <option value="{{ $key }}" @selected(old('theme_key', 'blue') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="program-order">Thứ tự hiển thị</label>
                            <input id="program-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="program-description">Mô tả</label>
                            <textarea id="program-description" name="description" class="form-control" rows="6" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị ngoài website</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Lưu hệ du học</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
