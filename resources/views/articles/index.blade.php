@extends('layouts.app')

@section('title', $selectedCategory ? $selectedCategory->name : 'Tin tức')

@section('content')
<section class="bg-gradient-to-br from-blue-50 to-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
            {{ $selectedCategory?->name ?: 'Tin tức & cẩm nang du học' }}
        </h1>
        <p class="text-gray-600 max-w-2xl">
            @if ($selectedCategory)
                {{ $selectedCategory->description ?: 'Danh sách bài viết thuộc chuyên mục đã chọn.' }}
            @else
                Cập nhật bài viết mới nhất về du học Hàn Quốc, học bổng, visa và kinh nghiệm chuẩn bị hồ sơ.
            @endif
        </p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-4 gap-8">
        <aside class="lg:col-span-1">
            <div class="rounded-2xl border bg-gray-50 p-6 sticky top-6">
                <h2 class="font-extrabold text-gray-900 mb-4">Danh mục</h2>
                <div class="space-y-2 text-sm">
                    <a href="{{ route('articles.index') }}" class="flex justify-between rounded-lg px-3 py-2 transition {{ $selectedCategory ? 'bg-white hover:bg-blue-50' : 'bg-blue-700 text-white' }}">
                        <span>Tất cả bài viết</span>
                        <span class="font-bold">{{ $categories->sum('articles_count') }}</span>
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('articles.index', ['category' => $category->slug]) }}" class="flex justify-between rounded-lg px-3 py-2 transition {{ $selectedCategory?->id === $category->id ? 'bg-blue-700 text-white' : 'bg-white hover:bg-blue-50' }}">
                            <span>{{ $category->name }}</span>
                            <span class="font-bold {{ $selectedCategory?->id === $category->id ? 'text-white' : 'text-blue-700' }}">
                                {{ $category->articles_count }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </aside>

        <div class="lg:col-span-3">
            @if ($selectedCategory)
                <div class="mb-5 flex items-center justify-between gap-4 rounded-2xl border border-blue-100 bg-blue-50 px-5 py-4">
                    <div>
                        <p class="text-sm font-semibold text-blue-700">Đang lọc theo danh mục</p>
                        <p class="text-lg font-bold text-blue-900">{{ $selectedCategory->name }}</p>
                    </div>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center rounded-full bg-white px-4 py-2 text-sm font-semibold text-blue-700 shadow-sm hover:bg-blue-100">
                        Xóa bộ lọc
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse ($articles as $article)
                    <article class="rounded-2xl border bg-white overflow-hidden shadow-sm hover:shadow-xl transition">
                        <img
                            src="{{ $article->thumbnail ? (filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail)) : asset('storage/mock/articles/visa-d4-1.svg') }}"
                            alt="{{ $article->title }}"
                            class="h-48 w-full object-cover"
                        >
                        <div class="p-5">
                            <p class="text-xs font-bold text-blue-700 mb-2">{{ $article->category?->name }}</p>
                            <h2 class="font-extrabold text-lg leading-snug mb-3">
                                <a href="{{ route('articles.show', $article) }}" class="hover:text-blue-700">{{ $article->title }}</a>
                            </h2>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-4 text-xs">
                                <span class="text-gray-500">{{ optional($article->published_at)->format('d/m/Y') }}</span>
                                <a href="{{ route('articles.show', $article) }}" class="font-semibold text-blue-700 hover:underline">Xem chi tiết</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="md:col-span-2 xl:col-span-3 rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center text-gray-500">
                        Chưa có bài viết phù hợp với danh mục này.
                    </div>
                @endforelse
            </div>

            <div class="mt-8">{{ $articles->links() }}</div>
        </div>
    </div>
</section>
@endsection
