@extends('admin.layouts.app')

@section('title', 'Đối tác')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý đối tác',
        'subtitle' => 'Theo dõi logo, website, thứ tự hiển thị và trạng thái hoạt động của các đối tác liên kết.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Đối tác hiện có</h2>
                    <p class="card-subtitle">Dễ theo dõi trạng thái và thứ tự hiển thị khi danh sách đối tác ngày càng nhiều.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="partner-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm đối tác</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Tên đối tác</th>
                                <th>Website</th>
                                <th>Thứ tự</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                                <tr>
                                    <td>
                                        @if ($partner->logo)
                                            <img
                                                src="{{ filter_var($partner->logo, FILTER_VALIDATE_URL) ? $partner->logo : asset('storage/' . $partner->logo) }}"
                                                alt="{{ $partner->name }}"
                                                class="table-media"
                                                style="object-fit: contain;"
                                            >
                                        @else
                                            <span class="table-summary">Chưa có</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-title">{{ $partner->name }}</div>
                                        <div class="table-meta">{{ \Illuminate\Support\Str::limit(strip_tags($partner->description), 90) ?: 'Không có mô tả' }}</div>
                                    </td>
                                    <td>{{ $partner->website ?: 'Chưa khai báo' }}</td>
                                    <td>{{ $partner->sort_order }}</td>
                                    <td>
                                        <span class="badge {{ $partner->is_active ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $partner->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="table-toggle" data-modal-open="partner-edit-modal-{{ $partner->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span>Sửa</span>
                                            </button>
                                            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Xóa đối tác này?')">
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
            </div>
        </div>

        @foreach ($partners as $partner)
            <div
                id="partner-edit-modal-{{ $partner->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa đối tác</h2>
                            <p class="admin-modal-subtitle">{{ $partner->name }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label class="form-label">Tên đối tác</label>
                                <input name="name" class="form-control" value="{{ $partner->name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input name="website" class="form-control" value="{{ $partner->website }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" accept="image/*" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự hiển thị</label>
                                <input type="number" min="0" name="sort_order" class="form-control" value="{{ $partner->sort_order }}">
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control rich-editor" rows="5">{{ $partner->description }}</textarea>
                            </div>
                            <div class="form-group form-group-full">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" @checked($partner->is_active)>
                                    <span>Hiển thị trên website</span>
                                </label>
                            </div>
                            <div class="form-group form-group-full">
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Cập nhật đối tác</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="partner-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm đối tác</h2>
                        <p class="admin-modal-subtitle">Cập nhật nhanh logo và thông tin hiển thị cho mỗi đơn vị hợp tác.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="partner-name">Tên đối tác</label>
                            <input id="partner-name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="partner-website">Website</label>
                            <input id="partner-website" name="website" class="form-control" value="{{ old('website') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="partner-logo">Logo</label>
                            <input id="partner-logo" type="file" name="logo" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="partner-order">Thứ tự hiển thị</label>
                            <input id="partner-order" type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order') }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="partner-description">Mô tả</label>
                            <textarea id="partner-description" name="description" class="form-control rich-editor" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Hiển thị trên website</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Thêm đối tác</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
