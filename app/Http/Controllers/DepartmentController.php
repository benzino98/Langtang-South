<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments.
     */
    public function index()
    {
        $departments = Department::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('departments.index', compact('departments'));
    }

    /**
     * Display the specified department.
     */
    public function show(string $slug)
    {
        $department = Department::active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('departments.show', compact('department'));
    }
}
