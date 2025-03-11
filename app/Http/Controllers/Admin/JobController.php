<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use App\Models\Article;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Job::query();

        
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('location') && !empty($request->location)) {
            $query->where('location_id', $request->location);
        }

        
        $jobs = $query->with('location')->paginate(10);

        
        $categories = \App\Models\Category::all();
        $locations = \App\Models\Location::all();

        return view('admin.jobs.index', compact('jobs', 'categories', 'locations'));
    }





        public function create()
    {
        
        $categories = \App\Models\Category::all();

        $locations = \App\Models\Location::all();

        
        return view('admin.jobs.create', compact('categories', 'locations'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location_id' => 'required|integer',
            'category_id' => 'required|integer',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $imagePath;
        }

        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('job_pdfs', 'public'); 
            $validatedData['pdf_path'] = $pdfPath;
        }

        Job::create($validatedData);

        return redirect('/admin/jobs')->with('success', 'Job created successfully!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location_id' => 'required|integer',
            'category_id' => 'required|integer',
            'deadline' => 'required|date',
            'date_posted' => 'nullable|date',
            'is_expired' => 'boolean',
            'application_link' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $imagePath;
        }

        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('job_pdfs', 'public'); 
            $validatedData['pdf_path'] = $pdfPath; 
        }

        Job::where('id', $id)->update($validatedData); 

        return redirect('/admin/jobs')->with('success', 'Job updated successfully!');
    }

    public function edit($id)
    {
        $job = \App\Models\Job::findOrFail($id);
        $categories = \App\Models\Category::all(); 
        $locations = \App\Models\Location::all(); 

        
        return view('admin.jobs.edit', compact('job', 'categories', 'locations'));
    }

    public function destroy($id)
    {
        \App\Models\Job::destroy($id);
        return redirect('/admin/jobs')->with('success', 'Job deleted successfully!');
    }

    public function markExpired($id)
    {
        $job = Job::findOrFail($id);
        $job->is_expired = true; 
        $job->save();
        return redirect()->route('admin.jobs.index')->with('success', 'Job marked as expired!');
    }


    public function governmentJobs(Request $request): View
    {

        $query = Job::query()->whereHas('category', function ($query) {
            $query->where('name', 'Government');
        });

        $jobsCount = $query->count(); // Count the jobs before pagination
        $jobs = $query->latest()->paginate(12);

        // Fetch recent articles for the sidebar
        $recentArticles = Article::orderBy('created_at', 'desc')
                                ->limit(3)
                                ->get();

        $categories = Category::all();
        $locations = Location::all();

        return view('government-jobs', [
            'jobs' => $jobs,
            'categories' => $categories,
            'locations' => $locations,
            'recentArticles' => $recentArticles,
            'jobsCount' => $jobsCount, // Pass jobsCount to the view
        ]);
    }

}