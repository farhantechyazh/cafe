@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4 text-primary">Updated Posts</h1>
    
    @if($updatedPost->isEmpty())
        <p class="text-center text-muted">No updated posts available.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($updatedPost as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td>{{ $post->category->category_name }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100" class="rounded">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
