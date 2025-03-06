<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Article;
use App\Models\Category; // **Import the Category Model**
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Http\Request; // Import the Request class

class AdminController extends Controller
{
    public function dashboard(Request $request) // Inject the Request object to access query parameters
    {
        // Fetch jobs with pagination, applying filters
        $jobs = Job::query() // Start with a query builder to enable filtering and pagination
            ->with('category', 'location') // Eager load relationships (optional, but efficient)
            ->when($request->job_search_keyword, function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%"); // Add search in description as well
            })
            ->when($request->job_category_filter, function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($request->job_date_filter, function ($query, $date) {
                $query->whereDate('deadline', $date); // Filter by date
            })
            ->paginate(10); // Paginate the results, showing 10 jobs per page

        // Fetch articles with pagination, applying filters
        $articles = Article::query() // Start with a query builder for articles as well
            ->when($request->article_search_keyword, function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%"); // Search in content as well
            })
            ->when($request->article_date_filter, function ($query, $date) {
                $query->whereDate('created_at', $date); // Filter articles by creation date
            })
            ->paginate(10); // Paginate articles, showing 10 articles per page


        // Fetch categories from the database for the filter dropdown
        $categories = Category::all();

        // Example category data and search frequency data (FETCH FROM DATABASE INSTEAD OF HARDCODING)
        $categorySearchCounts = DB::table('job_searches') // Assuming 'job_searches' table exists and has 'category_id'
            ->join('categories', 'job_searches.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('count(*) as search_count'))
            ->groupBy('categories.name')
            ->orderByDesc('search_count')
            ->take(5)
            ->get();

        $chartCategories = $categorySearchCounts->pluck('name')->toArray();
        $chartSearchData = $categorySearchCounts->pluck('search_count')->toArray();

        // Pass the data to the view
        return view('dashboard', compact('jobs', 'articles', 'categories', 'chartSearchData', 'chartCategories'));
    }
}