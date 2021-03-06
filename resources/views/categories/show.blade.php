@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold"><a href="#">{{ $category->name }}</a></h2>

                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                        @csrf
                    </form>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    @foreach ($category->blog as $blog)
                        <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
