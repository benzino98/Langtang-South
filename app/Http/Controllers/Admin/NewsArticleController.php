<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = \App\Models\NewsArticle::with('category')->latest()->paginate(10);
        return view('admin.news-articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\NewsCategory::all();
        return view('admin.news-articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreNewsArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'news');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        $data['user_id'] = auth()->id();
        $data['is_published'] = $request->boolean('is_published');

        \App\Models\NewsArticle::create($data);

        return redirect()->route('admin.news-articles.index')->with('success', 'News article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\NewsArticle $newsArticle)
    {
        $categories = \App\Models\NewsCategory::all();
        return view('admin.news-articles.edit', compact('newsArticle', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateNewsArticleRequest $request, \App\Models\NewsArticle $newsArticle)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($newsArticle->featured_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($newsArticle->featured_image);
            }
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'news');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        $newsArticle->update($data);

        return redirect()->route('admin.news-articles.index')->with('success', 'News article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\NewsArticle $newsArticle)
    {
        // Delete the featured image if it exists
        if ($newsArticle->featured_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($newsArticle->featured_image);
        }

        $newsArticle->delete();

        return redirect()->route('admin.news-articles.index')->with('success', 'News article deleted successfully.');
    }
}
