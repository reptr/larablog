@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach ($categories as $category)
                    <div class="card">
                        <div class="card-body">
                            <h2 class="font-weight-bold"><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
