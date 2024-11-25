@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Category</h2>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
