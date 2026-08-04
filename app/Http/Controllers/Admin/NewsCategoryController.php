<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\NewsCategory::latest()->paginate(10);
        return view('admin.news-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreNewsCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        \App\Models\NewsCategory::create($data);

        return redirect()->route('admin.news-categories.index')->with('success', 'News category created successfully.');
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
    public function edit(\App\Models\NewsCategory $newsCategory)
    {
        return view('admin.news-categories.edit', compact('newsCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateNewsCategoryRequest $request, \App\Models\NewsCategory $newsCategory)
    {
        $data = $request->validated();
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        $newsCategory->update($data);

        return redirect()->route('admin.news-categories.index')->with('success', 'News category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect()->route('admin.news-categories.index')->with('success', 'News category deleted successfully.');
    }
}
