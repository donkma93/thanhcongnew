@extends('admin.layouts.app')

@section('title', 'Tài khoản')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý tài khoản',
        'subtitle' => 'Tạo mới, cấp quyền và theo dõi trạng thái hoạt động của từng thành viên trong hệ thống.',
    ])

    <section class="content">
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Thêm tài khoản</h2>
                        <p class="card-subtitle">Tạo nhanh tài khoản mới cho quản trị viên, manager hoặc editor.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="admin-form-grid">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Họ tên</label>
                            <input id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input id="password" name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Vai trò</label>
                            <select id="role" name="role" class="form-select">
                                <option value="admin">Quản trị viên</option>
                                <option value="manager">Quản lý</option>
                                <option value="editor">Biên tập viên</option>
                            </select>
                        </div>
                        <div class="form-group form-group-full">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" checked>
                                <span>Kích hoạt ngay sau khi tạo</span>
                            </label>
                        </div>
                        <div class="form-group form-group-full">
                            <div class="form-actions">
                                <button class="btn btn-primary" type="submit">Tạo tài khoản</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">Danh sách tài khoản</h2>
                        <p class="card-subtitle">Cập nhật nhanh vai trò và trạng thái hoạt động mà không rời khỏi trang.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="entity-list">
                        @foreach ($users as $user)
                            <div class="entity-item">
                                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="admin-form-grid">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="name" value="{{ $user->name }}">
                                    <input type="hidden" name="email" value="{{ $user->email }}">

                                    <div class="form-group form-group-full">
                                        <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem; flex-wrap: wrap;">
                                            <div>
                                                <div style="font-weight: 700;">{{ $user->name }}</div>
                                                <div class="entity-meta">{{ $user->email }}</div>
                                            </div>
                                            <span class="badge {{ $user->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $user->is_active ? 'Đang hoạt động' : 'Tạm khóa' }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Vai trò</label>
                                        <select name="role" class="form-select">
                                            <option value="admin" @selected($user->role === 'admin')>Quản trị viên</option>
                                            <option value="manager" @selected($user->role === 'manager')>Quản lý</option>
                                            <option value="editor" @selected($user->role === 'editor')>Biên tập viên</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <label class="form-check" style="height: 100%;">
                                            <input type="checkbox" name="is_active" value="1" @checked($user->is_active)>
                                            <span>Kích hoạt</span>
                                        </label>
                                    </div>

                                    <div class="form-group form-group-full">
                                        <div class="entity-actions">
                                            <button class="btn btn-default" type="submit">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="entity-actions">
                                    <span class="entity-meta">Cập nhật quyền truy cập cho tài khoản này.</span>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Xóa tài khoản này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-link-danger" type="submit">Xóa tài khoản</button>
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
