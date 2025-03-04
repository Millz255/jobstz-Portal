<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job; // Add this import to work with the Job model
use App\Models\Article; // Add this import to work with the Article model

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch jobs and articles from the database
        $jobs = Job::all(); // Fetch all jobs
        $articles = Article::all(); // Fetch all articles
        
        // Example category data and search frequency data
        $categories = ['Tech', 'Design', 'Marketing']; // Replace this with actual data from your database if needed
        $searchData = [100, 75, 50]; // Example data, you can replace this with actual search frequency data
        
        // Pass the data to the view
        return view('admin.dashboard', compact('jobs', 'articles', 'categories', 'searchData'));
    }
}
