@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="container">
                    <h3 class="text-left">Detail Blogs</h3>
                    {{-- <p class="text-right">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Post</a>
                    </p> --}}
                </div>

                <div class="card mb-3">
                    <div class="card-header font-weight-bold">
                        <div class="container mb-4">
                            {{-- featured image --}}
                            @if ($blog->featured_image)
                                <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image">
                                <br>
                            @endif
                        </div>
                        <hr>
                        {{ $blog->title }}

                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                    </div>
                    <div class="card-body">
                        <p>{{ $blog->body }}</p>
                        {{-- karena collection / array utk $blog->category  --}}
                        {{-- <p>{{ $blog->category[0] }}</p> --}}

                        <hr>
                        <p class="font-weight-bold">Categories :
                        @foreach ($blog->category as $category)
                            <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
