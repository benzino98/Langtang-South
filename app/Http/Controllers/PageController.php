<?php

namespace App\Http\Controllers;

use App\Models\Leadership;
use App\Models\PublicNotice;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * General About page.
     */
    public function about()
    {
        return view('about.index');
    }

    /**
     * History page.
     */
    public function history()
    {
        return view('about.history');
    }

    /**
     * Vision & Mission page.
     */
    public function visionMission()
    {
        return view('about.vision-mission');
    }

    /**
     * Leadership page.
     */
    public function leadership()
    {
        $leaders = Leadership::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Categorize leaders for layout grouping
        $chairman = $leaders->where('title', 'Executive Chairman')->first();
        $viceChairman = $leaders->where('title', 'Vice Chairman')->first();
        $secretary = $leaders->where('title', 'Council Secretary')->first();
        $councillors = $leaders->where('title', 'Supervisory Councillor');

        return view('about.leadership', compact('chairman', 'viceChairman', 'secretary', 'councillors'));
    }

    /**
     * Organizational Structure page.
     */
    public function organisationalStructure()
    {
        return view('about.organisational-structure');
    }

    /**
     * Public Notices listing page.
     */
    public function notices()
    {
        $notices = PublicNotice::where('is_published', true)
            ->latest('published_at')
            ->paginate(10);

        return view('notices.index', compact('notices'));
    }
}
