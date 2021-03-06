@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name Category</label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $category->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Categories</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
