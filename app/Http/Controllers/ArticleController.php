<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->where('status', 'published')->latest('published_at')->paginate(9);
        $categories = Category::withCount('articles')->get();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        abort_unless($article->status === 'published', 404);
        $article->load('category');
        $relatedArticles = Article::with('category')
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
