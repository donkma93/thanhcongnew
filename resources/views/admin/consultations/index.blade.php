@extends('admin.layouts.app')

@section('title', 'Tư vấn')

@section('content')
    @include('admin.partials.header', [
        'title' => 'Đăng ký tư vấn',
        'subtitle' => 'Theo dõi danh sách người dùng đăng ký và ưu tiên liên hệ theo thời gian tạo yêu cầu.',
    ])

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Danh sách lead tư vấn</h2>
                    <p class="card-subtitle">Tổng hợp tên, liên hệ, điểm đến và ghi chú của từng yêu cầu mới.</p>
                </div>
            </div>
            <div class="card-body">
                @if ($consultations->isEmpty())
                    <div class="empty-state">Chưa có đăng ký tư vấn nào.</div>
                @else
                    <div class="grid grid-3">
                        @foreach ($consultations as $consultation)
                            <div class="entity-item">
                                <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem;">
                                    <div>
                                        <div style="font-weight: 700;">{{ $consultation->name }}</div>
                                        <div class="entity-meta">{{ $consultation->phone }}</div>
                                        <div class="entity-meta">{{ $consultation->email }}</div>
                                    </div>
                                    <span class="badge badge-info">{{ $consultation->destination }}</span>
                                </div>
                                <p class="entity-note">{{ $consultation->message ?: 'Không có nội dung bổ sung.' }}</p>
                                <div class="entity-meta">{{ $consultation->created_at?->format('d/m/Y H:i') }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
