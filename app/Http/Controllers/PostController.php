<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $post = new Post();
        $post->post_title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
    
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }
    
        $post->save();
    
        // Redirect to the show page with the newly created post's ID
        return redirect()->route('post.show', ['id' => $post->id])->with('success', 'Post created successfully!');
    }
    

    public function show($id)
    {
        $post = Post::findOrFail($id); // Retrieve the specific post by ID
        return view('post.show', compact('post'));
    }
    
    

    public function updatedPost()
    {
        // Fetch all posts, ordered by their updated date
        $updatedPost = Post::orderBy('updated_at', 'desc')->get();

        // Return the view with the updated posts
        return view('post.updated', compact('updatedPost'));
    }

    public function layoutView()
    {
        $updatedPosts = Post::whereNotNull('updated_at')->get(); // Example query to fetch updated posts
        return view('layouts.app', compact('updatedPosts'));
    }



    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all(); // You can pass categories to show in a dropdown if needed
        return view('post.edit', compact('post', 'categories'));
    }  

public function update(Request $request, $id)
{
    // Find the post by ID
    $post = Post::findOrFail($id);

    // Validate input data
    $request->validate([
        'post_title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Optional image validation
    ]);

    // Update the post fields
    $post->post_title = $request->post_title;
    $post->category_id = $request->category_id;
    $post->description = $request->description;

    // Check if there's a new image and handle it
    if ($request->hasFile('image')) {
        // If post has an old image, delete it (optional but recommended)
        if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
            unlink(storage_path('app/public/' . $post->image)); // Delete old image
        }
        
        // Store the new image
        $post->image = $request->file('image')->store('posts', 'public');
    }

    // Save the updated post data
    $post->save();

    // Redirect to the category view with success message
    return redirect()->route('category.show', $post->category_id)->with('success', 'Post updated successfully!');
}

public function destroy($id)
{
    $post = Post::findOrFail($id);
    
    
    // Delete the post
    $post->delete();

    return redirect()->route('category.show', $post->category_id)->with('success', 'Post deleted successfully!');
}



    
}
