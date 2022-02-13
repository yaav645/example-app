@extends('layout.admin')
@section('title')ALL NEWS/ADMIN - Редактировать новость@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>
    @include('inc.message')

    <form method="post" action="{{ route('admin.news.update', $news->id) }}">
        @csrf
        @method('put')
        <div class="for-group">
            <label for="title">Наименование</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
        </div>
        <div class="for-group">
            <label for="category_id">Категория</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="0">Без категории</option>
                @foreach($categories as $category)
                     <option @if($news->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="for-group">
            <label for="author">Автор</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}">
        </div>
        <div class="for-group">
            <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="for-group">
            <label for="message">Описание категории</label>
            <textarea name="description" id="description" class="form-control" >{{ $news->description }}</textarea>
        </div> <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <button type="button" class="btn btn-success" onclick="window.location='{{ route('admin.news.index') }}';return false;">Отмена</button>
    </form>

@endsection
