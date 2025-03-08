<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Article;
use App\Models\Category; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request; 

class AdminController extends Controller
{
    public function dashboard(Request $request) 
    {
        
        $jobs = Job::query() 
            ->with('category', 'location') 
            ->when($request->job_search_keyword, function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%"); 
            })
            ->when($request->job_category_filter, function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($request->job_date_filter, function ($query, $date) {
                $query->whereDate('deadline', $date); 
            })
            ->paginate(10); 

        
        $articles = Article::query() 
            ->when($request->article_search_keyword, function ($query, $keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%"); 
            })
            ->when($request->article_date_filter, function ($query, $date) {
                $query->whereDate('created_at', $date); 
            })
            ->paginate(10); 


    
        $categories = Category::all();

        
        $categorySearchCounts = DB::table('job_searches') 
            ->join('categories', 'job_searches.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('count(*) as search_count'))
            ->groupBy('categories.name')
            ->orderByDesc('search_count')
            ->take(5)
            ->get();

        $chartCategories = $categorySearchCounts->pluck('name')->toArray();
        $chartSearchData = $categorySearchCounts->pluck('search_count')->toArray();

      
        return view('dashboard', compact('jobs', 'articles', 'categories', 'chartSearchData', 'chartCategories'));
    }
}