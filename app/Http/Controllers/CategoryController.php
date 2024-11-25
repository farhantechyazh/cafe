<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    
    public function create()
    {
        return view('category.create');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id); // Fetch the category by ID
        $posts = $category->posts; // Assuming your Category model has a `posts` relationship
        return view('category.show', compact('category', 'posts'));
        
    }
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'category_name' => 'required|string|max:255|unique:categories,name',
        // ]);
        // dd($request);
        Category::create([
            'category_name' => $request->input('category_name'),
        ]);

        return redirect()->route('category.create')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
    
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $category->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $category->category_name = $request->category_name;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in the 'categories' folder under 'public' disk
            $category->image = $request->file('image')->store('categories', 'public');
        }
    
        $category->save(); // Save the category to the database
    
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
    public function layoutView()
    {
        $categories = Category::all(); // Fetch all categories
        return view('layouts.app', compact('categories'));
    }



}

