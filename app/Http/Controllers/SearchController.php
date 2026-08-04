<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\GalleryAlbum;
use App\Models\NewsArticle;
use App\Models\Project;
use App\Models\PublicNotice;

class SearchController extends Controller
{
    /**
     * Perform a global search across the website.
     */
    public function index()
    {
        $query = request('q');

        if (! $query || strlen(trim($query)) < 2) {
            return view('search.index', [
                'query' => $query,
                'results' => collect(),
                'total' => 0,
            ]);
        }

        $term = '%' . trim($query) . '%';

        $articles = NewsArticle::published()
            ->where(function ($q) use ($term) {
                $q->where('title', 'like', $term)
                    ->orWhere('content', 'like', $term)
                    ->orWhere('excerpt', 'like', $term);
            })
            ->select('id', 'title', 'slug', 'featured_image', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'News Article',
                'title' => $item->title,
                'url' => route('news.show', $item->slug),
                'image' => $item->featured_image ? asset('storage/' . $item->featured_image) : null,
                'date' => $item->created_at->format('d M, Y'),
            ]);

        $projects = Project::published()
            ->where(function ($q) use ($term) {
                $q->where('title', 'like', $term)
                    ->orWhere('description', 'like', $term)
                    ->orWhere('community_ward', 'like', $term);
            })
            ->select('id', 'title', 'slug', 'featured_image', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'Project',
                'title' => $item->title,
                'url' => route('projects.show', $item->slug),
                'image' => $item->featured_image ? asset('storage/' . $item->featured_image) : null,
                'date' => $item->created_at->format('d M, Y'),
            ]);

        $departments = Department::where('name', 'like', $term)
            ->orWhere('description', 'like', $term)
            ->select('id', 'name', 'slug', 'featured_image', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'Department',
                'title' => $item->name,
                'url' => route('departments.show', $item->slug),
                'image' => $item->featured_image ? asset('storage/' . $item->featured_image) : null,
                'date' => null,
            ]);

        $albums = GalleryAlbum::published()
            ->where('title', 'like', $term)
            ->orWhere('description', 'like', $term)
            ->select('id', 'title', 'slug', 'cover_image', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'Gallery Album',
                'title' => $item->title,
                'url' => route('gallery.show', $item->slug),
                'image' => $item->cover_image ? asset('storage/' . $item->cover_image) : null,
                'date' => $item->created_at->format('d M, Y'),
            ]);

        $notices = PublicNotice::where('is_published', true)
            ->where('title', 'like', $term)
            ->orWhere('description', 'like', $term)
            ->select('id', 'title', 'description', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'Public Notice',
                'title' => $item->title,
                'url' => route('notices.index'),
                'image' => null,
                'date' => $item->created_at->format('d M, Y'),
            ]);

        $documents = Document::published()
            ->where('title', 'like', $term)
            ->orWhere('description', 'like', $term)
            ->select('id', 'title', 'created_at')
            ->get()
            ->map(fn ($item) => [
                'type' => 'Document',
                'title' => $item->title,
                'url' => route('downloads.index'),
                'image' => null,
                'date' => $item->created_at->format('d M, Y'),
            ]);

        $results = $articles
            ->concat($projects)
            ->concat($departments)
            ->concat($albums)
            ->concat($notices)
            ->concat($documents)
            ->sortByDesc('date');

        return view('search.index', [
            'query' => $query,
            'results' => $results,
            'total' => $results->count(),
        ]);
    }
}
