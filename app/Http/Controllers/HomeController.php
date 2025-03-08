<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactFormSubmitted;
use App\Models\Article;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $category_id = $request->input('category');
        $location_id = $request->input('location');

        $jobs = Job::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->when($category_id, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($location_id, function ($query) use ($location_id) {
                $query->where('location_id', $location_id);
            })
            ->latest()
            ->paginate(12);

        $categories = Category::all();
        $locations = Location::all();

        $recentArticles = Article::latest()->take(5)->get(); // <---- Fetch recent articles**

        return view('index', compact('jobs', 'categories', 'locations', 'recentArticles')); // <---- Pass articles here
    }

    public function show($slug) // Keep using slug as route parameter (as per our earlier fix)
    {
        $job = Job::with(['category', 'location'])
            ->where('slug', $slug)
            ->firstOrFail();

        // --- Fetch related jobs from the same category ---
        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id) // Exclude the current job
            ->latest()
            ->take(5) // Limit to a reasonable number of related jobs (e.g., 5)
            ->get();
        // --- End related jobs logic ---

        return view('jobs.show', compact('job', 'relatedJobs')); // Pass $relatedJobs to the view
    }

    public function about()
    {
        return view('about');
    }

    public function submitContactForm(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255', 
            'message' => 'required|string',
        ]);
    
        
        ContactMessage::create($validatedData);
    
        // 3. Send email notification
        $adminEmail = 'mgimwaemily@gmail.com';
        Mail::to($adminEmail)->send(new ContactFormSubmitted($validatedData));
    
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }


    public function contact()
    {
        return view('contact'); 
    }


    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $jobs = Job::latest()->offset($offset)->take(12)->get();

        $view = view('jobs.list', compact('jobs'))->render();
        return response()->json(['html' => $view]);
    }
}
