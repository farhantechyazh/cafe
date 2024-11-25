@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Category: {{ $category->category_name }}</h2>
    <h4>Posts</h4>
    @if($category->posts->isEmpty())
        <p class="text-center">No posts found for this category.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ $post->category->category_name }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
