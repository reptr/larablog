@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post">
                    <div class="form-group">
                        <label for="name">Name Category</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
