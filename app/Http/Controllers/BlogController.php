<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(6); // Get recent articles

        // Fetch most read articles - Example: Order by created_at (replace with your logic)
        $mostReadArticles = Article::orderBy('created_at', 'desc')
                                     ->take(5)
                                     ->get();

        return view('blog.index', compact('articles', 'mostReadArticles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.show', compact('article'));
    }
}