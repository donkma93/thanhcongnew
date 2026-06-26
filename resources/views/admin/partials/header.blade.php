@php
    $subtitle = $subtitle ?? 'Theo dõi, cập nhật và điều phối nội dung hệ thống từ một giao diện quản trị thống nhất.';
    $actionLabel = $actionLabel ?? 'Xem trang chủ';
    $actionHref = $actionHref ?? route('home');
@endphp

<section class="content-header">
    <div class="page-heading">
        <div>
            <p class="page-pretitle">Bảng điều khiển quản trị</p>
            <h1 class="page-title">{{ $title }}</h1>
            <p class="page-subtitle">{{ $subtitle }}</p>
        </div>
        <a href="{{ $actionHref }}" class="btn btn-default">{{ $actionLabel }}</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Có lỗi xảy ra:</strong>
            <ul style="margin: 0.5rem 0 0; padding-left: 1.1rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</section>
