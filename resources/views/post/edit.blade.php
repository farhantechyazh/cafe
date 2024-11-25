@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- This is crucial for sending a PUT request to update the data -->

        
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" name="post_title" id="post_title" class="form-control" value="{{ old('post_title', $post->post_title) }}" required>
        </div>

     
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

     
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $post->description) }}</textarea>
        </div>

       
        <div class="form-group mt-3">
            <label for="image">Post Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Post</button>
    </form>
</div>
@endsection
