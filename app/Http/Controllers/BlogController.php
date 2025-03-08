<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(6);

        $mostReadArticles = Article::orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get();

        return view('blog.index', compact('articles', 'mostReadArticles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('article'));
    }
}