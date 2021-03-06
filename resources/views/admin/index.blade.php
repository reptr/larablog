@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron bg-primary">
            <h3 class="text-white font-weight-bold">Admin Dashboard</h3>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <a href="{{ route('blogs.create') }}" class="btn btn-lg btn-primary btn-margin-right">Create Blog</a>
            <a href="{{ route('blogs.trash') }}" class="btn btn-lg btn-danger btn-margin-right">Trashed Blog</a>
            <a href="{{ route('categories.create') }}" class="btn btn-lg btn-success btn-margin-right">Create Categories</a>
        </div>
    </div>
@endsection
