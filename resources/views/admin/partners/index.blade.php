@extends('admin.layouts.app')

@section('title', 'Đối tác')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý đối tác',
        'subtitle' => 'Theo dõi logo, website, thứ tự hiển thị và trạng thái hoạt động của các đối tác liên kết.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Thêm đối tác</h2>
                        <p class="card-subtitle">Cập nhật nhanh logo và thông tin hiển thị cho mỗi đơn vị hợp tác.</p>
                    </div>
                </div>
                <div class="card-body">
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
                            <button class="btn btn-primary" type="submit">Thêm đối tác</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Đối tác hiện có</h2>
                        <p class="card-subtitle">Tổng quan nhanh danh sách đối tác để kiểm tra trạng thái hiển thị.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="entity-list">
                        @foreach ($partners as $partner)
                            <div class="entity-item">
                                <div style="display: flex; gap: 1rem; align-items: flex-start;">
                                    @if ($partner->logo)
                                        <img
                                            src="{{ filter_var($partner->logo, FILTER_VALIDATE_URL) ? $partner->logo : asset('storage/' . $partner->logo) }}"
                                            alt="{{ $partner->name }}"
                                            class="media-thumb"
                                            style="object-fit: contain; background: #fff;"
                                        >
                                    @endif
                                    <div style="flex: 1; min-width: 0;">
                                        <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem; flex-wrap: wrap;">
                                            <div>
                                                <div style="font-weight: 700;">{{ $partner->name }}</div>
                                                <div class="entity-meta">{{ $partner->website ?: 'Chưa khai báo website' }}</div>
                                            </div>
                                            <span class="badge {{ $partner->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $partner->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </div>

                                        @if ($partner->description)
                                            <p class="entity-note">{!! $partner->description !!}</p>
                                        @endif

                                        <div class="entity-actions">
                                            <span class="entity-meta">Thứ tự hiển thị: {{ $partner->sort_order }}</span>
                                            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Xóa đối tác này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-link-danger" type="submit">Xóa đối tác</button>
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
