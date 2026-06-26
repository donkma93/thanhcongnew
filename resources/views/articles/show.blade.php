@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="bg-white">
    <section class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <p class="text-blue-100 font-bold mb-3">{{ $article->category?->name }} · {{ $article->created_at->format('d/m/Y') }}</p>
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">{{ $article->title }}</h1>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            @if ($article->thumbnail)
                <img src="{{ filter_var($article->thumbnail, FILTER_VALIDATE_URL) ? $article->thumbnail : asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full rounded-3xl shadow mb-10">
            @endif
            <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">{{ $article->content }}</div>
        </div>
    </section>

    @if ($relatedArticles->isNotEmpty())
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4 max-w-5xl">
                <h2 class="text-2xl font-extrabold mb-6">Bài viết liên quan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $related)
                        <a href="{{ route('articles.show', $related) }}" class="rounded-2xl bg-white border p-5 hover:shadow-lg transition">
                            <p class="text-xs font-bold text-blue-700 mb-2">{{ $related->category?->name }}</p>
                            <h3 class="font-extrabold text-gray-900">{{ $related->title }}</h3>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</article>
@endsection
