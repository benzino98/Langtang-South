<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = GalleryAlbum::withCount('images')->latest()->paginate(10);
        return view('admin.gallery-albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery-albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreGalleryAlbumRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('cover_image'), 'gallery/covers');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        GalleryAlbum::create($data);

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryAlbum $galleryAlbum)
    {
        return view('admin.gallery-albums.edit', compact('galleryAlbum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateGalleryAlbumRequest $request, GalleryAlbum $galleryAlbum)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            // Delete old cover image
            if ($galleryAlbum->cover_image) {
                Storage::disk('public')->delete($galleryAlbum->cover_image);
            }
            $data['cover_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('cover_image'), 'gallery/covers');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        $galleryAlbum->update($data);

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryAlbum $galleryAlbum)
    {
        // Delete all images in the album
        foreach ($galleryAlbum->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Delete the cover image
        if ($galleryAlbum->cover_image) {
            Storage::disk('public')->delete($galleryAlbum->cover_image);
        }

        $galleryAlbum->delete();

        return redirect()->route('admin.gallery-albums.index')->with('success', 'Gallery album deleted successfully.');
    }
}
