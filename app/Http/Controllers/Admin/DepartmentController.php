<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = \App\Models\Department::latest()->paginate(10);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'departments');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        \App\Models\Department::create($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
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
    public function edit(\App\Models\Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, \App\Models\Department $department)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($department->featured_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($department->featured_image);
            }
            $data['featured_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('featured_image'), 'departments');
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        $department->update($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Department $department)
    {
        // Delete the featured image if it exists
        if ($department->featured_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($department->featured_image);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
}
