<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Paginate articles, 10 per page
        $articles = Article::latest()->paginate(10);
        return view('blog.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.show', compact('article'));
    }
}
