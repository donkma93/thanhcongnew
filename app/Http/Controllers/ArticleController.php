<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = null;

        $categories = Category::withCount([
            'articles' => fn ($query) => $query->where('status', 'published'),
        ])->orderBy('name')->get();

        $articlesQuery = Article::with('category')
            ->where('status', 'published')
            ->latest('published_at');

        if ($request->filled('category')) {
            $selectedCategory = Category::where('slug', $request->string('category'))->firstOrFail();
            $articlesQuery->where('category_id', $selectedCategory->id);
        }

        if ($request->boolean('scholarship')) {
            $articlesQuery->where('is_scholarship', true);
        }

        $articles = $articlesQuery
            ->paginate(9)
            ->withQueryString();

        return view('articles.index', compact('articles', 'categories', 'selectedCategory'));
    }

    public function show(Article $article)
    {
        abort_unless($article->status === 'published', 404);

        $article->load('category');

        $relatedArticles = Article::with('category')
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
