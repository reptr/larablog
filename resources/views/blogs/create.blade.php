@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post Blog') }}</div>

                <div class="card-body">
                    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                            <input type="text" name="title" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            @foreach ($categories as $category)
                                <input type="checkbox" name="category_id[]" id="" value="{{ $category->id }}" class="form-check-input">
                                <label class="form-check-label btn btn-margin-left">{{ $category->name }}</label>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="featured_image">Featured-Image</label>
                            <input type="file" name="featured_image" id="" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
