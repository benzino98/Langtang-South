<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = \App\Models\Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreProjectRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'projects');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        \App\Models\Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
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
    public function edit(\App\Models\Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateProjectRequest $request, \App\Models\Project $project)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($project->featured_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->featured_image);
            }
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'projects');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Project $project)
    {
        // Delete the featured image if it exists
        if ($project->featured_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
