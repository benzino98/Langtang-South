<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImage::with('album')->latest()->paginate(15);
        return view('admin.gallery-images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = GalleryAlbum::all();
        return view('admin.gallery-images.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreGalleryImageRequest $request)
    {
        $albumId = $request->validated('gallery_album_id');
        $caption = $request->validated('caption', null);

        $sortOrder = GalleryImage::where('gallery_album_id', $albumId)->max('sort_order') ?? 0;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $sortOrder++;

                GalleryImage::create([
                    'gallery_album_id' => $albumId,
                    'image_path' => app(\App\Services\ImageOptimizer::class)->store($image, 'gallery/' . $albumId),
                    'caption' => $caption,
                    'sort_order' => $sortOrder,
                ]);
            }
        }

        return redirect()->route('admin.gallery-images.index')->with('success', 'Gallery images uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryImage $galleryImage)
    {
        $albums = GalleryAlbum::all();
        return view('admin.gallery-images.edit', compact('galleryImage', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateGalleryImageRequest $request, GalleryImage $galleryImage)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($galleryImage->image_path) {
                Storage::disk('public')->delete($galleryImage->image_path);
            }
            $data['image_path'] = app(\App\Services\ImageOptimizer::class)->store($request->file('image'), 'gallery/' . $data['gallery_album_id']);
        }

        $galleryImage->update($data);

        return redirect()->route('admin.gallery-images.index')->with('success', 'Gallery image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $galleryImage)
    {
        // Delete the image file
        if ($galleryImage->image_path) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $galleryImage->delete();

        return redirect()->route('admin.gallery-images.index')->with('success', 'Gallery image deleted successfully.');
    }
}
