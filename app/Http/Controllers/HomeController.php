<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\NewsArticle;
use App\Models\PublicNotice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        $latestNews = NewsArticle::with('category')
            ->where('is_published', true)
            ->latest('published_at')
            ->take(6)
            ->get();

        $announcements = PublicNotice::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        $upcomingEvents = Event::where('is_published', true)
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('welcome', compact('latestNews', 'announcements', 'upcomingEvents'));
    }
}
