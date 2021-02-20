@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h3 class="text-left">Detail Blogs</h3>
                    {{-- <p class="text-right">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Post</a>
                    </p> --}}
                </div>

                <div class="card mb-3">
                    <div class="card-header text-bold">
                        {{ $blog->title }}
                    </div>
                    <div class="card-body">
                        <p>{{ $blog->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
