@extends('auth.layouts.app')

@section('title', 'Đăng nhập quản trị')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-blue-100 p-8">
        <div class="text-center mb-8">
            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-800 text-white text-2xl font-extrabold">T</div>
            <h1 class="mt-4 text-2xl font-extrabold text-gray-900">Đăng nhập quản trị</h1>
            <p class="mt-2 text-sm text-gray-500">Dành cho nhân sự Thành Công Edu</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Mật khẩu</label>
                <input type="password" name="password" required class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" value="1" class="rounded border-gray-300">
                Ghi nhớ đăng nhập
            </label>
            <button class="w-full rounded-xl bg-blue-800 px-4 py-3 font-extrabold text-white hover:bg-blue-900 transition">Đăng nhập</button>
        </form>
    </div>
</section>
@endsection
