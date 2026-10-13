<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leadership;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadershipController extends Controller
{
    public function index()
    {
        $leadership = Leadership::orderBy('sort_order', 'asc')->paginate(20);
        return view('admin.leadership.index', compact('leadership'));
    }

    public function create()
    {
        return view('admin.leadership.create');
    }

    public function store(\App\Http\Requests\Admin\StoreLeadershipRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            $data['image_path'] = app(\App\Services\ImageOptimizer::class)->store($request->file('profile_image'), 'leadership');
        }
        unset($data['profile_image']);

        $data['slug'] = Str::slug($data['full_name']);

        Leadership::create($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Leadership $leadership)
    {
        return view('admin.leadership.edit', compact('leadership'));
    }

    public function update(\App\Http\Requests\Admin\UpdateLeadershipRequest $request, Leadership $leadership)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($leadership->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($leadership->image_path);
            }
            $data['image_path'] = app(\App\Services\ImageOptimizer::class)->store($request->file('profile_image'), 'leadership');
        }
        unset($data['profile_image']);

        $data['slug'] = Str::slug($data['full_name']);

        $leadership->update($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member updated successfully.');
    }

    public function destroy(Leadership $leadership)
    {
        if ($leadership->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($leadership->image_path);
        }

        $leadership->delete();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership member deleted successfully.');
    }
}
