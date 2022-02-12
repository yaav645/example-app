@extends('layout.main')
@section('title')ALL NEWS - Список новостей@endsection
@section('content')
@forelse ($newslist as $news)
    <div class="col">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                <p class="card-text"><strong>{{ $news->title }}</strong><br><br>{!! $news->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                        <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Смотреть подробней</a>

                    </div>
                    <small class="text-muted">Автор:{{ $news->author }} <br> {{ now()->format('d-m-Y H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>Записей нет</p>
@endforelse
@endsection
