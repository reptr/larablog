@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post Blog') }}</div>

                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                    <div class="form-group">
                        @method('PATCH')

                        <label for="title">Title</label>
                            <input type="text" name="title" id="" class="form-control" value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $blog->body }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
