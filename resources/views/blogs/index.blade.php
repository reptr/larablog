@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h3 class="text-left">Blogs</h3>
                    <p class="text-right">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Post</a>
                        <a href="{{ route('blogs.trash') }}" class="btn btn-danger">Trash Post</a>
                    </p>
                </div>

                @foreach ($blogs as $blog)
                    <div class="card mb-3">
                        <div class="card-header text-bold">
                            <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>


                                <form action="{{ route('blogs.delete', $blog->id) }}" method="post" class="float-right">
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    {{-- jika page expired maka tambahkan csrf --}}
                                    @csrf
                                </form>

                                <a class="btn btn-sm btn-primary float-right" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                                <br>
                        </div>
                        <div class="card-body">
                            <p>{{ $blog->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
