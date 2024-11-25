<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Post;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('categories', Category::all());
        View::composer('*', function ($view) {
            $view->with('updatedPosts', Post::latest()->take(5)->get());
        });
    
        
    }

    

    
}
