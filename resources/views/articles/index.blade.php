@extends('layouts.app')

@section('title', 'Tin tức')

@section('content')
<section class="bg-gradient-to-br from-blue-50 to-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Tin tức & cẩm nang du học</h1>
        <p class="text-gray-600 max-w-2xl">Cập nhật bài viết mới nhất về du học Hàn Quốc, học bổng, visa và kinh nghiệm chuẩn bị hồ sơ.</p>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-4 gap-8">
        <aside class="lg:col-span-1">
            <div class="rounded-2xl border bg-gray-50 p-6 sticky top-6">
                <h2 class="font-extrabold text-gray-900 mb-4">Danh mục</h2>
                <div class="space-y-2 text-sm">
                    @foreach ($categories as $category)
                        <div class="flex justify-between rounded-lg bg-white px-3 py-2">
                            <span>{{ $category->name }}</span>
                            <span class="font-bold text-blue-700">{{ $category->articles_count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>

        <div class="lg:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse ($articles as $article)
                    <article class="rounded-2xl border bg-white overflow-hidden shadow-sm hover:shadow-xl transition">
                        @if ($article->thumbnail)
                            <img src="{{ filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gradient-to-br from-blue-100 to-orange-100"></div>
                        @endif
                        <div class="p-5">
                            <p class="text-xs font-bold text-blue-700 mb-2">{{ $article->category?->name }}</p>
                            <h2 class="font-extrabold text-lg leading-snug mb-3"><a href="{{ route('articles.show', $article) }}" class="hover:text-blue-700">{{ $article->title }}</a></h2>
                            <p class="text-sm text-gray-600 line-clamp-3">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500">Chưa có bài viết.</p>
                @endforelse
            </div>
            <div class="mt-8">{{ $articles->links() }}</div>
        </div>
    </div>
</section>
@endsection
