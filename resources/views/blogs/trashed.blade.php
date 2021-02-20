@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h3 class="text-left">Trash Blogs</h3>
                </div>

                @foreach ($trashedBlog as $blog)
                    <div class="card mb-3">
                        <div class="card-header text-bold">
                            <h4 class="float-left">{{ $blog->title }}</h4>
                            <form method="get" action="{{ route('blogs.restore', $blog->id) }}">
                                <button type="submit" class="btn btn-success btn-sm float-right">
                                    Restore
                                </button>
                            </form>
                            <form method="post" action="{{ route('blogs.permanent-delete', $blog->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm float-right mr-2">
                                    Permanent Delete
                                </button>
                            </form>
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
