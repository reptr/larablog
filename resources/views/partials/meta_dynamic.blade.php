{{-- @section('meta_title') {{ $blog->meta_title }} @endsection

@section('meta_description') {{ $blog->meta_description }} @endsection --}}

{{-- {{ dd($blog) }} --}}

@section('meta_title')
    @foreach ($blog as $blg)
        @if ($id_blog == $blg->id)
            {{ $blg->meta_title }}
        @endif
    @endforeach
@endsection

@section('meta_description')
    @foreach ($blog as $blg)
        @if ($id_blog == $blg->id)
            {{ $blg->meta_description }}
        @endif
    @endforeach
@endsection
