@extends('admin.layouts.app')

@section('title', 'Bài viết')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý bài viết',
        'subtitle' => 'Tạo mới bài viết, gắn danh mục, quản lý ảnh đại diện và theo dõi danh sách nội dung đang hiển thị.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Bài viết hiện có</h2>
                    <p class="card-subtitle">Hiển thị dạng bảng để dễ quét trạng thái, danh mục và thao tác khi dữ liệu nhiều.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="article-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm bài viết</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Loại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>
                                        @if ($article->thumbnail)
                                            <img
                                                src="{{ filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail) }}"
                                                alt="{{ $article->title }}"
                                                class="table-media"
                                            >
                                        @else
                                            <span class="table-summary">Chưa có</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-title">{{ $article->title }}</div>
                                        <div class="table-meta">/{{ $article->slug }}</div>
                                    </td>
                                    <td>{{ $article->category?->name }}</td>
                                    <td>{{ ucfirst($article->status) }}</td>
                                    <td>
                                        <span class="badge {{ $article->is_scholarship ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $article->is_scholarship ? 'Học bổng' : 'Bài thường' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="table-toggle" data-edit-toggle="article-edit-{{ $article->id }}">Sửa</button>
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Xóa bài viết này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-link-danger" type="submit">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="article-edit-{{ $article->id }}" class="table-edit-row" hidden>
                                    <td colspan="6">
                                        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group form-group-full">
                                                <label class="form-label">Tiêu đề bài viết</label>
                                                <input name="title" class="form-control" value="{{ $article->title }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Slug</label>
                                                <input name="slug" class="form-control" value="{{ $article->slug }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Danh mục</label>
                                                <select name="category_id" class="form-select" required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($article->category_id == $category->id)>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Trạng thái</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="draft" @selected($article->status === 'draft')>Nháp</option>
                                                    <option value="published" @selected($article->status === 'published')>Công khai</option>
                                                    <option value="hidden" @selected($article->status === 'hidden')>Ẩn</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-group-full">
                                                <label class="form-label">Ảnh đại diện</label>
                                                <input type="file" name="thumbnail" accept="image/*" class="form-control">
                                            </div>
                                            <div class="form-group form-group-full">
                                                <label class="form-label">Nội dung</label>
                                                <textarea name="content" class="form-control rich-editor" rows="10" required>{{ $article->content }}</textarea>
                                            </div>
                                            <div class="form-group form-group-full">
                                                <label class="form-check">
                                                    <input type="checkbox" name="is_scholarship" value="1" @checked($article->is_scholarship)>
                                                    <span>Đánh dấu là bài học bổng</span>
                                                </label>
                                            </div>
                                            <div class="form-group form-group-full">
                                                <button class="btn btn-primary btn-sm" type="submit">Cập nhật bài viết</button>
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
            id="article-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Đăng bài viết</h2>
                        <p class="admin-modal-subtitle">Nhập thông tin cơ bản và nội dung đầy đủ cho bài viết mới.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-grid">
                        @csrf
                        <div class="form-group form-group-full">
                            <label class="form-label" for="article-title">Tiêu đề bài viết</label>
                            <input id="article-title" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="article-slug">Slug</label>
                            <input id="article-slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Bỏ trống để tự động tạo">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="article-category">Danh mục</label>
                            <select id="article-category" name="category_id" class="form-select" required>
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="article-status">Trạng thái</label>
                            <select id="article-status" name="status" class="form-select" required>
                                <option value="draft" @selected(old('status') === 'draft')>Nháp</option>
                                <option value="published" @selected(old('status') === 'published')>Công khai</option>
                                <option value="hidden" @selected(old('status') === 'hidden')>Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="article-thumbnail">Ảnh đại diện</label>
                            <input id="article-thumbnail" type="file" name="thumbnail" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="article-content">Nội dung</label>
                            <textarea id="article-content" name="content" class="form-control rich-editor" rows="10" required>{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_scholarship" value="1" @checked(old('is_scholarship'))>
                                <span>Đánh dấu là bài học bổng</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Đăng bài</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
