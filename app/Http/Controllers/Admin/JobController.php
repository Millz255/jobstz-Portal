<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Job::query();

        // Filter by keyword in title
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        // Filter by location
        if ($request->has('location') && !empty($request->location)) {
            $query->where('location_id', $request->location);
        }

        // Eager load the location relationship to avoid N+1 queries
        $jobs = $query->with('location')->get(); // This loads the jobs with their location data

        // Get categories and locations for dropdowns (if needed)
        $categories = \App\Models\Category::all();
        $locations = \App\Models\Location::all();

        return view('admin.jobs.index', compact('jobs', 'categories', 'locations'));
    }



        public function create()
    {
        // Get all categories
        $categories = \App\Models\Category::all();

        // Pass categories to the view
        return view('admin.jobs.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url', // This line should be included
        ]);

        \App\Models\Job::create($validatedData);

        return redirect('/admin/jobs')->with('success', 'Job created successfully!');
    }

    public function edit($id)
    {
        $job = \App\Models\Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url',
        ]);

        \App\Models\Job::where('id', $id)->update($validatedData);

        return redirect('/admin/jobs')->with('success', 'Job updated successfully!');
    }

    public function destroy($id)
    {
        \App\Models\Job::destroy($id);
        return redirect('/admin/jobs')->with('success', 'Job deleted successfully!');
    }

        public function markExpired($id)
    {
        // Find the job by ID
        $job = Job::findOrFail($id);

        // Mark the job as expired (adjust according to your database schema)
        $job->status = 'expired'; // or whatever your status field is for expired jobs
        $job->save();

        // Redirect back with a success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job marked as expired!');
    }


    public function governmentJobs()
    {
        // Assuming category name is 'Government' in the categories table
        $governmentCategoryId = \App\Models\Category::where('name', 'Government')->first()->id;

        // Get all jobs with the government category
        $jobs = \App\Models\Job::where('category_id', $governmentCategoryId)->get();

        // Get categories and locations for dropdowns (optional if needed)
        $categories = \App\Models\Category::all();
        $locations = \App\Models\Location::all();

        return view('admin.jobs.index', compact('jobs', 'categories', 'locations'));
    }


}