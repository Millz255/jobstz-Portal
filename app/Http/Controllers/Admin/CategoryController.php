<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',  
        ]);

        
        Category::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,  
        ]);

        
        Category::where('id', $id)->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        
        Category::destroy($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
