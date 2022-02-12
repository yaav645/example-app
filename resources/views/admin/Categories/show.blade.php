@extends('layout.main')
@section('title')ALL NEWS - {{ $category->title }}@endsection
@section('content')
    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

    <p class="card-text"><strong>{{ $category->title }}</strong><br><br>{!! $category->description !!}</p>
@endsection

