@extends('admin.layouts.app')

@section('title', 'Cảm nhận học viên')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Sinh viên nói gì về chúng tôi',
        'subtitle' => 'Quản lý cảm nhận học viên hiển thị ngoài trang chủ, bao gồm ảnh đại diện, khóa học và số sao đánh giá.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách hiện có</h2>
                    <p class="card-subtitle">Theo dõi danh sách cảm nhận bằng bảng rõ cột để đỡ rối khi có nhiều học viên.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="testimonial-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm cảm nhận</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($testimonials->isEmpty())
                    <div class="empty-state">Chưa có cảm nhận học viên nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Học viên</th>
                                    <th>Khóa học</th>
                                    <th>Đánh giá</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            @if ($testimonial->avatar)
                                                <img
                                                    src="{{ filter_var($testimonial->avatar, FILTER_VALIDATE_URL) ? $testimonial->avatar : asset('storage/' . $testimonial->avatar) }}"
                                                    alt="{{ $testimonial->student_name }}"
                                                    class="table-media"
                                                    style="border-radius: 999px;"
                                                >
                                            @else
                                                <div class="table-avatar">{{ strtoupper(mb_substr($testimonial->student_name, 0, 1)) }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-title">{{ $testimonial->student_name }}</div>
                                            <div class="table-meta">{{ \Illuminate\Support\Str::limit($testimonial->content, 90) }}</div>
                                        </td>
                                        <td>{{ $testimonial->course_name }}</td>
                                        <td>{{ $testimonial->rating }}/5</td>
                                        <td>{{ $testimonial->sort_order }}</td>
                                        <td>
                                            <span class="badge {{ $testimonial->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $testimonial->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-modal-open="testimonial-edit-modal-{{ $testimonial->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Sửa</span>
                                                </button>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Xóa cảm nhận học viên này?')">
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

        @foreach ($testimonials as $testimonial)
            <div
                id="testimonial-edit-modal-{{ $testimonial->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa cảm nhận</h2>
                            <p class="admin-modal-subtitle">{{ $testimonial->student_name }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="form-label">Tên sinh viên</label>
                                <input name="student_name" class="form-control" value="{{ $testimonial->student_name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Khóa học</label>
                                <input name="course_name" class="form-control" value="{{ $testimonial->course_name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Avatar mới</label>
                                <input type="file" name="avatar" accept="image/*" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Đánh giá</label>
                                <select name="rating" class="form-select" required>
                                    @for ($rating = 5; $rating >= 1; $rating--)
                                        <option value="{{ $rating }}" @selected($testimonial->rating == $rating)>{{ $rating }} sao</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự hiển thị</label>
                                <input type="number" min="0" name="sort_order" class="form-control" value="{{ $testimonial->sort_order }}">
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-label">Nội dung</label>
                                <textarea name="content" class="form-control" rows="5" required>{{ $testimonial->content }}</textarea>
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" @checked($testimonial->is_active)>
                                    <span>Hiển thị ngoài website</span>
                                </label>
                            </div>
                            <div class="form-group form-group-full">
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Cập nhật cảm nhận</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="testimonial-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm cảm nhận mới</h2>
                        <p class="admin-modal-subtitle">Nhập nội dung đánh giá nổi bật để hiển thị chuyên nghiệp trên website.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="testimonial-student-name">Tên sinh viên</label>
                            <input id="testimonial-student-name" name="student_name" class="form-control" value="{{ old('student_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="testimonial-course-name">Khóa học</label>
                            <input id="testimonial-course-name" name="course_name" class="form-control" value="{{ old('course_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="testimonial-avatar">Avatar</label>
                            <input id="testimonial-avatar" type="file" name="avatar" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="testimonial-rating">Đánh giá</label>
                            <select id="testimonial-rating" name="rating" class="form-select" required>
                                @for ($rating = 5; $rating >= 1; $rating--)
                                    <option value="{{ $rating }}" @selected(old('rating', 5) == $rating)>{{ $rating }} sao</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="testimonial-order">Thứ tự hiển thị</label>
                            <input id="testimonial-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="testimonial-content">Nội dung</label>
                            <textarea id="testimonial-content" name="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị ngoài website</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Lưu cảm nhận</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
