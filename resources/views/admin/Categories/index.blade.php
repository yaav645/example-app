@extends('layout.admin')
@section('title')ALL NEWS/ADMIN - Список категорий@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">КАТЕГОРИИ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Категория</th>
                <th scope="col">Дата обновления</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a href="{{ route('category.show', [$category->id]) }}" style="text-decoration: none;">{{ $category->title }}</a>
                    </td>
                    <td>
                        @if($category->updated_at)
                            {{ $category->updated_at->format('d-m-Y H:i') }}
                        @else - @endif
                    <td>
                        <a href="{{ route('admin.category.edit', [$category->id]) }}">Ред.</a>&nbsp;|&nbsp; <a href="javascript" style="color: red">Уд.</a>
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


@endsection
