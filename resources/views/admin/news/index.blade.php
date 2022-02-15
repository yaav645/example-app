@extends('layout.admin')
@section('title')ALL NEWS/ADMIN - Лента новостей@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">НОВОСТИ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>

            </div>
        </div>
    </div>
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата обновения</th>
                <th scope="col">Действие</th>

            </tr>
            </thead>
            <tbody>
            @forelse ($newslist as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>
                        <a href="{{ route('news.show', [$news->id]) }}" style="text-decoration: none;">{{ $news->title }}</a>
                    </td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>
                        @if($news->updated_at)
                            {{ $news->updated_at->format('d-m-Y H:i') }}
                        @else - @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', [$news->id]) }}">Ред.</a>&nbsp;|&nbsp; <a href="javascript" style="color: red">Уд.</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $newslist->links() }}
    </div>
@endsection

