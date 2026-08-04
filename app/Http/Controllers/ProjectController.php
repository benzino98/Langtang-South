<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of published projects.
     */
    public function index(Request $request)
    {
        $query = Project::published();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('community_ward', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $status = $request->input('status');
            if (in_array($status, ['planned', 'ongoing', 'completed'])) {
                $query->where('status', $status);
            }
        }

        $projects = $query->latest()->paginate(9)->withQueryString();

        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show(string $slug)
    {
        $project = Project::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('projects.show', compact('project'));
    }
}
