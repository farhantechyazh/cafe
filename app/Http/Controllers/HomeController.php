<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the latest updated posts (you can adjust the number as needed)
        $updatedPosts = Post::latest()->take(5)->get(); 

        return view('home', compact('updatedPosts'));
    }
}
