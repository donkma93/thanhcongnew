@extends('admin.layouts.app')

@section('title', 'Slider trang chủ')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Slider trang chủ',
        'subtitle' => 'Quản lý các slide đầu trang để admin cập nhật và trang chủ tự động hiển thị ngay.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách slide hiện có</h2>
                    <p class="card-subtitle">Dạng bảng giúp dễ quản lý chiến dịch, hình ảnh và thứ tự hiển thị hơn.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="slider-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm slide</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($sliders->isEmpty())
                    <div class="empty-state">Chưa có slider trang chủ nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Nút bấm</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            @if ($slider->background_image)
                                                <img
                                                    src="{{ filter_var($slider->background_image, FILTER_VALIDATE_URL) ? $slider->background_image : asset('storage/' . $slider->background_image) }}"
                                                    alt="Slider {{ $slider->id }}"
                                                    class="table-media"
                                                    style="width: 96px;"
                                                >
                                            @else
                                                <span class="table-summary">Chưa có</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-title">{!! $slider->title !!}</div>
                                            <div class="table-meta">{{ \Illuminate\Support\Str::limit($slider->description, 90) }}</div>
                                        </td>
                                        <td>{{ $slider->button_text ?: 'Chưa có' }}</td>
                                        <td>{{ $slider->sort_order }}</td>
                                        <td>
                                            <span class="badge {{ $slider->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $slider->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-modal-open="slider-edit-modal-{{ $slider->id }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Sửa</span>
                                                </button>
                                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Xóa slider trang chủ này?')">
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

        @foreach ($sliders as $slider)
            <div
                id="slider-edit-modal-{{ $slider->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa slide</h2>
                            <p class="admin-modal-subtitle">Slide #{{ $slider->id }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <div class="form-group form-group-full">
                                <label class="form-label">Tiêu đề</label>
                                <textarea name="title" class="form-control" rows="3" required>{{ $slider->title }}</textarea>
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control" rows="4">{{ $slider->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ảnh nền mới</label>
                                <input type="file" name="background_image" accept="image/*" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Lớp phủ màu</label>
                                <select name="overlay_class" class="form-select" required>
                                    @foreach ([
                                        'bg-blue-900/60' => 'Xanh dương đậm',
                                        'bg-purple-900/60' => 'Tím đậm',
                                        'bg-green-900/60' => 'Xanh lá đậm',
                                        'bg-red-900/60' => 'Đỏ đậm',
                                        'bg-slate-900/60' => 'Xám đậm',
                                    ] as $value => $label)
                                        <option value="{{ $value }}" @selected($slider->overlay_class === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nút bấm</label>
                                <input name="button_text" class="form-control" value="{{ $slider->button_text }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Liên kết nút</label>
                                <input name="button_link" class="form-control" value="{{ $slider->button_link }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự hiển thị</label>
                                <input type="number" min="0" name="sort_order" class="form-control" value="{{ $slider->sort_order }}">
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" @checked($slider->is_active)>
                                    <span>Hiển thị trên trang chủ</span>
                                </label>
                            </div>
                            <div class="form-group form-group-full">
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Cập nhật slider</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="slider-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm slide mới</h2>
                        <p class="admin-modal-subtitle">Tạo nhanh từng banner, tiêu đề, mô tả, nút bấm và lớp phủ màu cho slider.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                        @csrf
                        <div class="form-group form-group-full">
                            <label class="form-label" for="slider-title">Tiêu đề</label>
                            <textarea id="slider-title" name="title" class="form-control" rows="3" required>{{ old('title') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="slider-description">Mô tả</label>
                            <textarea id="slider-description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slider-image">Ảnh nền</label>
                            <input id="slider-image" type="file" name="background_image" accept="image/*" class="form-control">
                            <div class="entity-meta" style="margin-top: 0.45rem;">
                                Kích thước khuyến nghị: 1920 x 600 px. Tỷ lệ ngang 16:5 hoặc gần tương đương, định dạng JPG/PNG/WebP, tối đa 4MB.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slider-overlay">Lớp phủ màu</label>
                            <select id="slider-overlay" name="overlay_class" class="form-select" required>
                                @foreach ([
                                    'bg-blue-900/60' => 'Xanh dương đậm',
                                    'bg-purple-900/60' => 'Tím đậm',
                                    'bg-green-900/60' => 'Xanh lá đậm',
                                    'bg-red-900/60' => 'Đỏ đậm',
                                    'bg-slate-900/60' => 'Xám đậm',
                                ] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('overlay_class', 'bg-blue-900/60') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slider-button-text">Nút bấm</label>
                            <input id="slider-button-text" name="button_text" class="form-control" value="{{ old('button_text') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slider-button-link">Liên kết nút</label>
                            <input id="slider-button-link" name="button_link" class="form-control" value="{{ old('button_link', '#consultation-form') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slider-order">Thứ tự hiển thị</label>
                            <input id="slider-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị trên trang chủ</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Lưu slider</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
