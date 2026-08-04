<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicNotice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = PublicNotice::latest()->paginate(10);
        return view('admin.public-notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.public-notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StorePublicNoticeRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('notices', 'public');
        }

        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $request->boolean('is_published') ? now() : null;

        PublicNotice::create($data);

        return redirect()->route('admin.public-notices.index')->with('success', 'Public notice created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicNotice $publicNotice)
    {
        return view('admin.public-notices.edit', compact('publicNotice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdatePublicNoticeRequest $request, PublicNotice $publicNotice)
    {
        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            // Delete old attachment if it exists
            if ($publicNotice->attachment_path) {
                Storage::disk('public')->delete($publicNotice->attachment_path);
            }
            $data['attachment_path'] = $request->file('attachment')->store('notices', 'public');
        }

        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $request->boolean('is_published') ? now() : null;

        $publicNotice->update($data);

        return redirect()->route('admin.public-notices.index')->with('success', 'Public notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicNotice $publicNotice)
    {
        // Delete the attachment if it exists
        if ($publicNotice->attachment_path) {
            Storage::disk('public')->delete($publicNotice->attachment_path);
        }

        $publicNotice->delete();

        return redirect()->route('admin.public-notices.index')->with('success', 'Public notice deleted successfully.');
    }
}
