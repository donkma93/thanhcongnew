@extends('admin.layouts.app')

@section('title', 'Vinh danh học viên')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Vinh danh học viên xuất sắc',
        'subtitle' => 'Quản lý các gương mặt học viên tiêu biểu để hiển thị nổi bật ngoài trang chủ với thành tích và kết quả cụ thể.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách đang hiển thị</h2>
                    <p class="card-subtitle">Dạng bảng giúp kiểm soát thành tích, hệ học và thứ tự hiển thị dễ dàng hơn.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="achievement-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm học viên</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($achievements->isEmpty())
                    <div class="empty-state">Chưa có học viên vinh danh nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Học viên</th>
                                    <th>Hệ học</th>
                                    <th>Huy hiệu</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($achievements as $achievement)
                                    <tr>
                                        <td>
                                            @if ($achievement->avatar)
                                                <img
                                                    src="{{ filter_var($achievement->avatar, FILTER_VALIDATE_URL) ? $achievement->avatar : asset('storage/' . $achievement->avatar) }}"
                                                    alt="{{ $achievement->student_name }}"
                                                    class="table-media"
                                                    style="border-radius: 999px;"
                                                >
                                            @else
                                                <div class="table-avatar">{{ strtoupper(mb_substr($achievement->student_name, 0, 1)) }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-title">{{ $achievement->student_name }}</div>
                                            <div class="table-meta">{{ $achievement->achievement_title }}</div>
                                        </td>
                                        <td>{{ $achievement->program_name }}</td>
                                        <td>{{ $achievement->result_badge ?: 'Không có' }}</td>
                                        <td>{{ $achievement->sort_order }}</td>
                                        <td>
                                            <span class="badge {{ $achievement->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $achievement->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-edit-toggle="achievement-edit-{{ $achievement->id }}">Sửa</button>
                                                <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" onsubmit="return confirm('Xóa học viên vinh danh này?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-link-danger" type="submit">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="achievement-edit-{{ $achievement->id }}" class="table-edit-row" hidden>
                                        <td colspan="7">
                                            <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label class="form-label">Tên học viên</label>
                                                    <input name="student_name" class="form-control" value="{{ $achievement->student_name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Chương trình / hệ học</label>
                                                    <input name="program_name" class="form-control" value="{{ $achievement->program_name }}" required>
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <label class="form-label">Tiêu đề thành tích</label>
                                                    <input name="achievement_title" class="form-control" value="{{ $achievement->achievement_title }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Huy hiệu kết quả</label>
                                                    <input name="result_badge" class="form-control" value="{{ $achievement->result_badge }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Avatar mới</label>
                                                    <input type="file" name="avatar" accept="image/*" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Thứ tự hiển thị</label>
                                                    <input type="number" min="0" name="sort_order" class="form-control" value="{{ $achievement->sort_order }}">
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <label class="form-label">Mô tả thành tích</label>
                                                    <textarea name="achievement_description" class="form-control" rows="5" required>{{ $achievement->achievement_description }}</textarea>
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <label class="form-check">
                                                        <input type="checkbox" name="is_active" value="1" @checked($achievement->is_active)>
                                                        <span>Hiển thị ngoài website</span>
                                                    </label>
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <button class="btn btn-primary btn-sm" type="submit">Cập nhật học viên vinh danh</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div
            id="achievement-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm học viên vinh danh</h2>
                        <p class="admin-modal-subtitle">Mỗi hồ sơ có thể gồm ảnh đại diện, hệ học, thành tích nổi bật và huy hiệu kết quả.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="achievement-student-name">Tên học viên</label>
                            <input id="achievement-student-name" name="student_name" class="form-control" value="{{ old('student_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="achievement-program-name">Chương trình / hệ học</label>
                            <input id="achievement-program-name" name="program_name" class="form-control" value="{{ old('program_name') }}" required>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="achievement-title">Tiêu đề thành tích</label>
                            <input id="achievement-title" name="achievement_title" class="form-control" value="{{ old('achievement_title') }}" placeholder="Ví dụ: Đậu học bổng 100% Đại học Yonsei" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="achievement-badge">Huy hiệu kết quả</label>
                            <input id="achievement-badge" name="result_badge" class="form-control" value="{{ old('result_badge') }}" placeholder="Ví dụ: TOPIK 6 / Visa thẳng / Học bổng 100%">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="achievement-avatar">Avatar</label>
                            <input id="achievement-avatar" type="file" name="avatar" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="achievement-order">Thứ tự hiển thị</label>
                            <input id="achievement-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="achievement-description">Mô tả thành tích</label>
                            <textarea id="achievement-description" name="achievement_description" class="form-control" rows="6" required>{{ old('achievement_description') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị ngoài website</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Lưu học viên vinh danh</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
