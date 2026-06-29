@extends('admin.layouts.app')

@section('title', 'Tư vấn')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Đăng ký tư vấn',
        'subtitle' => 'Theo dõi danh sách người dùng đăng ký, cập nhật thông tin liên hệ và xử lý dữ liệu gọn gàng theo dạng bảng.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách lead tư vấn</h2>
                    <p class="card-subtitle">Dùng bảng để dễ rà theo thông tin liên hệ, chương trình quan tâm và chỉnh sửa ngay trên từng dòng.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="consultation-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm đăng ký</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if ($consultations->isEmpty())
                    <div class="empty-state">Chưa có đăng ký tư vấn nào.</div>
                @else
                    <div class="table-wrap">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Chương trình</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultations as $consultation)
                                    <tr>
                                        <td><div class="table-title">{{ $consultation->name }}</div></td>
                                        <td>{{ $consultation->phone }}</td>
                                        <td>{{ $consultation->email ?: 'Không có' }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $consultation->destination ?: 'Chưa chọn' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-summary">
                                                {{ \Illuminate\Support\Str::limit($consultation->message ?: 'Không có nội dung bổ sung.', 120) }}
                                            </div>
                                        </td>
                                        <td>{{ $consultation->created_at?->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <button type="button" class="table-toggle" data-edit-toggle="consultation-edit-{{ $consultation->id }}">Sửa</button>
                                                <form action="{{ route('admin.consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Xóa đăng ký tư vấn này?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-link-danger" type="submit">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="consultation-edit-{{ $consultation->id }}" class="table-edit-row" hidden>
                                        <td colspan="7">
                                            <form action="{{ route('admin.consultations.update', $consultation) }}" method="POST" class="admin-form-grid">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label class="form-label">Họ tên</label>
                                                    <input name="name" class="form-control" value="{{ $consultation->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Số điện thoại</label>
                                                    <input name="phone" class="form-control" value="{{ $consultation->phone }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $consultation->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Chương trình quan tâm</label>
                                                    <input name="destination" class="form-control" value="{{ $consultation->destination }}">
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <label class="form-label">Nội dung</label>
                                                    <textarea name="message" class="form-control" rows="4">{{ $consultation->message }}</textarea>
                                                </div>
                                                <div class="form-group form-group-full">
                                                    <button class="btn btn-primary btn-sm" type="submit">Cập nhật đăng ký tư vấn</button>
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
            id="consultation-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm đăng ký tư vấn</h2>
                        <p class="admin-modal-subtitle">Cho phép nhập nhanh một lead mới nếu đội ngũ tư vấn tiếp nhận từ điện thoại, Zalo hoặc nguồn offline.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
                    <form action="{{ route('admin.consultations.store') }}" method="POST" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="consultation-name">Họ tên</label>
                            <input id="consultation-name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="consultation-phone">Số điện thoại</label>
                            <input id="consultation-phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="consultation-email">Email</label>
                            <input id="consultation-email" type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="consultation-destination">Chương trình quan tâm</label>
                            <input id="consultation-destination" name="destination" class="form-control" value="{{ old('destination') }}" placeholder="Ví dụ: Du học Nhật Bản">
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-label" for="consultation-message">Nội dung</label>
                            <textarea id="consultation-message" name="message" class="form-control" rows="5">{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Thêm đăng ký tư vấn</button>
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
