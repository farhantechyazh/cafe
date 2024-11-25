@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="image">Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
