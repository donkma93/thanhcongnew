@extends('admin.layouts.app')

@section('title', 'Bài viết')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý bài viết',
        'subtitle' => 'Tạo mới bài viết, gắn danh mục, quản lý ảnh đại diện và theo dõi danh sách nội dung đang hiện có.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Đăng bài viết</h2>
                        <p class="card-subtitle">Nhập thông tin cơ bản và nội dung đầy đủ cho bài viết mới.</p>
                    </div>
                </div>
                <div class="card-body">
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
                            <button class="btn btn-primary" type="submit">Đăng bài</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Bài viết hiện có</h2>
                        <p class="card-subtitle">Danh sách bài viết đã tạo để đội ngũ có thể kiểm tra và dọn dẹp nhanh.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="entity-list">
                        @foreach ($articles as $article)
                            <div class="entity-item">
                                <div style="display: flex; gap: 1rem; align-items: flex-start;">
                                    @if ($article->thumbnail)
                                        <img
                                            src="{{ filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail) }}"
                                            alt="{{ $article->title }}"
                                            class="media-thumb"
                                        >
                                    @endif
                                    <div style="flex: 1; min-width: 0;">
                                        <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem; flex-wrap: wrap;">
                                            <div>
                                                <div style="font-weight: 700;">{{ $article->title }}</div>
                                                <div class="entity-meta">{{ $article->category?->name }} · /{{ $article->slug }}</div>
                                            </div>
                                            <span class="badge {{ $article->is_scholarship ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $article->is_scholarship ? 'Học bổng' : 'Bài thường' }}
                                            </span>
                                        </div>

                                        @if ($article->excerpt)
                                            <p class="entity-note">{{ $article->excerpt }}</p>
                                        @endif

                                        <div class="entity-actions">
                                            <span class="entity-meta">Quản lý danh mục và ảnh đại diện thông qua form tạo/cập nhật.</span>
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Xóa bài viết này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-link-danger" type="submit">Xóa bài viết</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
