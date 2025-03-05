<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Job::query();

        // Apply filters if present
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('location') && !empty($request->location)) {
            $query->where('location_id', $request->location);
        }

        // Paginate jobs, limit to 10 jobs per page
        $jobs = $query->with('location')->paginate(10);

        // Get categories and locations for dropdowns
        $categories = \App\Models\Category::all();
        $locations = \App\Models\Location::all();

        return view('admin.jobs.index', compact('jobs', 'categories', 'locations'));
    }





        public function create()
    {
        // Get all categories
        $categories = \App\Models\Category::all();

        $locations = \App\Models\Location::all();

        // Pass categories to the view
        return view('admin.jobs.create', compact('categories', 'locations'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location_id' => 'required|integer',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
        ]);

        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public'); // Store in storage/app/public/company_logos
            $validatedData['company_logo'] = $imagePath; // Save path to database
        }

        Job::create($validatedData);

        return redirect('/admin/jobs')->with('success', 'Job created successfully!');
    }

    public function edit($id)
    {
        $job = \App\Models\Job::findOrFail($id);
        $categories = \App\Models\Category::all(); // Fetch categories (you might already have this, ensure it's present if you use categories in edit form)
        $locations = \App\Models\Location::all(); // Fetch all locations

        // Pass job, categories, and locations to the view
        return view('admin.jobs.edit', compact('job', 'categories', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location_id' => 'required|integer',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
        ]);

        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public'); // Store in storage/app/public/company_logos
            $validatedData['company_logo'] = $imagePath; // Save path to database
        }

        Job::where('id', $id)->update($validatedData);

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