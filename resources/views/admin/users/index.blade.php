@extends('admin.layouts.app')

@section('title', 'Tài khoản')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Quản lý tài khoản',
        'subtitle' => 'Tạo mới, cấp quyền và theo dõi trạng thái hoạt động của từng thành viên trong hệ thống.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách tài khoản</h2>
                    <p class="card-subtitle">Dễ theo dõi hơn khi số lượng thành viên tăng và vẫn chỉnh sửa trực tiếp từng dòng.</p>
                </div>
                <div class="card-header-actions">
                    <button type="button" class="btn btn-outline-primary" data-modal-open="user-create-modal">
                        <i class="fa-solid fa-plus"></i>
                        <span>Thêm tài khoản</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td><div class="table-title">{{ $user->name }}</div></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        <span class="badge {{ $user->is_active ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $user->is_active ? 'Đang hoạt động' : 'Tạm khóa' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="table-toggle" data-modal-open="user-edit-modal-{{ $user->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span>Sửa</span>
                                            </button>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Xóa tài khoản này?')">
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

        @foreach ($users as $user)
            <div
                id="user-edit-modal-{{ $user->id }}"
                class="admin-modal"
                data-admin-modal
                hidden
            >
                <div class="admin-modal-backdrop" data-modal-backdrop></div>
                <div class="admin-modal-dialog">
                    <div class="admin-modal-header">
                        <div>
                            <h2 class="admin-modal-title">Sửa tài khoản</h2>
                            <p class="admin-modal-subtitle">{{ $user->name }} - {{ $user->email }}</p>
                        </div>
                        <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                    </div>
                    <div class="admin-modal-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="admin-form-grid">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="name" value="{{ $user->name }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
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
                                <div class="form-actions">
                                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                                    <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div
            id="user-create-modal"
            class="admin-modal"
            data-admin-modal
            data-modal-auto-open="{{ $errors->any() ? 'true' : 'false' }}"
            hidden
        >
            <div class="admin-modal-backdrop" data-modal-backdrop></div>
            <div class="admin-modal-dialog">
                <div class="admin-modal-header">
                    <div>
                        <h2 class="admin-modal-title">Thêm tài khoản</h2>
                        <p class="admin-modal-subtitle">Tạo nhanh tài khoản mới cho quản trị viên, manager hoặc editor.</p>
                    </div>
                    <button type="button" class="admin-modal-close" data-modal-close aria-label="Đóng">&times;</button>
                </div>
                <div class="admin-modal-body">
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
                                <button type="button" class="btn btn-default" data-modal-close>Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
