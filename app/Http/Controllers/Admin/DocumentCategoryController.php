<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use Illuminate\Support\Str;

class DocumentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DocumentCategory::withCount('documents')->latest()->paginate(10);
        return view('admin.document-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.document-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreDocumentCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        DocumentCategory::create($data);

        return redirect()->route('admin.document-categories.index')->with('success', 'Document category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentCategory $documentCategory)
    {
        return view('admin.document-categories.edit', compact('documentCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateDocumentCategoryRequest $request, DocumentCategory $documentCategory)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $documentCategory->update($data);

        return redirect()->route('admin.document-categories.index')->with('success', 'Document category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentCategory $documentCategory)
    {
        $documentCategory->delete();

        return redirect()->route('admin.document-categories.index')->with('success', 'Document category deleted successfully.');
    }
}
