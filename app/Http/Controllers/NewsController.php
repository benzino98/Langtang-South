<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of published news articles.
     */
    public function index(Request $request)
    {
        $query = NewsArticle::published()->with('category');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $articles = $query->latest('published_at')->paginate(9)->withQueryString();
        $categories = NewsCategory::withCount('articles')->get();

        return view('news.index', compact('articles', 'categories'));
    }

    /**
     * Display the specified news article.
     */
    public function show(string $slug)
    {
        $article = NewsArticle::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = NewsArticle::published()
            ->where('news_category_id', $article->news_category_id)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('news.show', compact('article', 'relatedArticles'));
    }
}
