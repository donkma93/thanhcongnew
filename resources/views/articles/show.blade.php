@extends('layouts.app')

@section('title', $article->title)
@section('meta_description', $article->meta_description ?: $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 150))

@section('content')
<article class="bg-white">
    <section class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="mb-4 flex flex-wrap items-center gap-3 text-sm text-blue-100">
                @if ($article->category)
                    <a href="{{ route('articles.index', ['category' => $article->category->slug]) }}" class="inline-flex rounded-full bg-white/10 px-4 py-1.5 font-semibold hover:bg-white/20">
                        {{ $article->category->name }}
                    </a>
                @endif
                <span>{{ ($article->published_at ?? $article->created_at)->format('d/m/Y') }}</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">{{ $article->title }}</h1>
            @if ($article->excerpt)
                <p class="mt-5 max-w-3xl text-lg text-blue-100">{{ $article->excerpt }}</p>
            @endif
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <img
                src="{{ $article->thumbnail ? (filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail)) : asset('storage/mock/articles/visa-d4-1.svg') }}"
                alt="{{ $article->title }}"
                class="w-full rounded-3xl shadow mb-10"
            >
            <div class="prose max-w-none text-gray-700 leading-relaxed">{!! $article->content !!}</div>
        </div>
    </section>

    @if ($relatedArticles->isNotEmpty())
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4 max-w-5xl">
                <div class="mb-6 flex items-end justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-extrabold">Bài viết liên quan</h2>
                        <p class="mt-2 text-gray-600">Cùng chuyên mục {{ $article->category?->name }} để người đọc tiếp tục theo dõi nội dung phù hợp.</p>
                    </div>
                    @if ($article->category)
                        <a href="{{ route('articles.index', ['category' => $article->category->slug]) }}" class="hidden md:inline-flex rounded-full bg-blue-700 px-5 py-3 text-sm font-bold text-white hover:bg-blue-800">
                            Xem tất cả trong danh mục
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach ($relatedArticles as $related)
                        <a href="{{ route('articles.show', $related) }}" class="rounded-2xl bg-white border p-5 hover:shadow-lg transition">
                            <p class="text-xs font-bold text-blue-700 mb-2">{{ $related->category?->name }}</p>
                            <h3 class="font-extrabold text-gray-900 line-clamp-3">{{ $related->title }}</h3>
                            <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                                {{ $related->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($related->content), 110) }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</article>
@endsection
