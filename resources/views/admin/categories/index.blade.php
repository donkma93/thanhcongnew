@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý danh mục',
        'subtitle' => 'Tổ chức cấu trúc nội dung bằng danh mục rõ ràng để bài viết dễ tìm và dễ điều hướng hơn.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh mục hiện có</h2>
                    <p class="card-subtitle">Dạng bảng giúp bạn dễ quét số bài viết và cập nhật từng danh mục nhanh hơn.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="category-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm danh mục</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Slug</th>
                                <th>Số bài viết</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><div class="table-title">{{ $category->name }}</div></td>
                                    <td>/{{ $category->slug }}</td>
                                    <td><span class="badge badge-info">{{ $category->articles_count }} bài viết</span></td>
                                    <td><div class="table-summary">{{ \Illuminate\Support\Str::limit(strip_tags($category->description), 110) ?: 'Không có mô tả' }}</div></td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="table-toggle" data-edit-toggle="category-edit-{{ $category->id }}">Sửa</button>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Xóa danh mục này? Các bài viết thuộc danh mục cũng sẽ bị xóa.')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-link-danger" type="submit">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="category-edit-{{ $category->id }}" class="table-edit-row" hidden>
                                    <td colspan="5">
                                        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="admin-form-grid">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label class="form-label">Tên danh mục</label>
                                                <input name="name" class="form-control" value="{{ $category->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Slug</label>
                                                <input name="slug" class="form-control" value="{{ $category->slug }}">
                                            </div>
                                            <div class="form-group form-group-full">
                                                <label class="form-label">Mô tả</label>
                                                <textarea name="description" class="form-control rich-editor" rows="4">{{ $category->description }}</textarea>
                                            </div>
                                            <div class="form-group form-group-full">
                                                <button class="btn btn-primary btn-sm" type="submit">Cập nhật danh mục</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div
            id="category-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm danh mục</h2>
                        <p class="admin-modal-subtitle">Tạo danh mục mới và bổ sung mô tả hỗ trợ SEO, nội dung và điều hướng.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="category-name">Tên danh mục</label>
                            <input id="category-name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="category-slug">Slug</label>
                            <input id="category-slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Bỏ trống để tự động tạo">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="category-description">Mô tả</label>
                            <textarea id="category-description" name="description" class="form-control rich-editor" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Thêm danh mục</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
