<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of published gallery albums.
     */
    public function index()
    {
        $albums = GalleryAlbum::published()
            ->withCount('images')
            ->latest()
            ->paginate(12);

        return view('gallery.index', compact('albums'));
    }

    /**
     * Display the specified gallery album and its images.
     */
    public function show(string $slug)
    {
        $album = GalleryAlbum::published()
            ->with(['images' => function ($query) {
                $query->orderBy('sort_order');
            }])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('gallery.show', compact('album'));
    }
}
