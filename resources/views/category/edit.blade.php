@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Category</h2>
    <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Category Name -->
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}" required>
        </div>
        
        <!-- Title -->
        <div class="form-group mt-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}" required>
        </div>

        <!-- Description -->
        <div class="form-group mt-3">
            <label for="description"> Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $category->description }}</textarea>
        </div>

        <!-- Image -->
        <div class="form-group mt-3">
            <label for="image">Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
</div>
@endsection
