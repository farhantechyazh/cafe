@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Post Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $post->post_title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Category: {{ $post->category->category_name }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
            @endif
        </div>
    </div>
</div>
@endsection
