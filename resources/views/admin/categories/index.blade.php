@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý danh mục',
        'subtitle' => 'Tổ chức cấu trúc nội dung bằng danh mục rõ ràng để bài viết dễ tìm và dễ điều hướng hơn.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Thêm danh mục</h2>
                        <p class="card-subtitle">Tạo danh mục mới và bổ sung mô tả hỗ trợ SEO, nội dung và điều hướng.</p>
                    </div>
                </div>
                <div class="card-body">
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
                            <button class="btn btn-primary" type="submit">Thêm danh mục</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Danh mục hiện có</h2>
                        <p class="card-subtitle">Tổng hợp danh mục đang sử dụng và số lượng bài viết trong từng nhóm.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="entity-list">
                        @foreach ($categories as $category)
                            <div class="entity-item">
                                <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem; flex-wrap: wrap;">
                                    <div>
                                        <div style="font-weight: 700;">{{ $category->name }}</div>
                                        <div class="entity-meta">/{{ $category->slug }}</div>
                                    </div>
                                    <span class="badge badge-info">{{ $category->articles_count }} bài viết</span>
                                </div>

                                @if ($category->description)
                                    <p class="entity-note">{!! $category->description !!}</p>
                                @endif

                                <div class="entity-actions">
                                    <span class="entity-meta">Xóa danh mục sẽ ảnh hưởng đến bài viết liên quan.</span>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Xóa danh mục này? Các bài viết thuộc danh mục cũng sẽ bị xóa.')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-link-danger" type="submit">Xóa danh mục</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
