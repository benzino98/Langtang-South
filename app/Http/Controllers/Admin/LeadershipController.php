<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadership = \App\Models\Leadership::latest()->paginate(10);
        return view('admin.leadership.index', compact('leadership'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leadership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\Admin\StoreLeadershipRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('profile_image'), 'leadership');
        }

        \App\Models\Leadership::create($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member created successfully.');
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
    public function edit(\App\Models\Leadership $leadership)
    {
        return view('admin.leadership.edit', compact('leadership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\Admin\UpdateLeadershipRequest $request, \App\Models\Leadership $leadership)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($leadership->profile_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($leadership->profile_image);
            }
            $data['profile_image'] = app(\App\Services\ImageOptimizer::class)->store($request->file('profile_image'), 'leadership');
        }

        $leadership->update($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Leadership $leadership)
    {
        // Delete the profile image if it exists
        if ($leadership->profile_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($leadership->profile_image);
        }

        $leadership->delete();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member deleted successfully.');
    }
}
