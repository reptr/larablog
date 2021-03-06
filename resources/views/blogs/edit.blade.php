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

                        <div class="form-group form-check form-check-inline">
                            {{ $blog->category->count() ? 'current categories: ' : '' }}
                            &nbsp;
                            @foreach ($blog->category as $category)
                                <input type="checkbox" name="category_id[]" id="" value="{{ $category->id }}" class="form-check-input" checked>
                                <label class="form-check-label btn btn-margin-left">{{ $category->name }}</label>
                            @endforeach
                        </div>
                        <div class="form-group form-check form-check-inline">
                            {{ $blog->category->count() ? 'unused categories: ' : '' }}
                            &nbsp;
                            @foreach ($filtered as $category)
                                <input type="checkbox" name="category_id[]" id="" value="{{ $category->id }}" class="form-check-input">
                                <label class="form-check-label btn btn-margin-left">{{ $category->name }}</label>
                            @endforeach
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
