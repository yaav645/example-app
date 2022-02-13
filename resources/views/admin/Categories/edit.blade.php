@extends('layout.admin')
@section('title')ALL NEWS/ADMIN - Редактировать категорию@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
    </div>
    @include('inc.message')

    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('put')
        <div class="for-group">
            <label for="title">Наименование</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
        </div>
        <div class="for-group">
            <label for="message">Описание категории</label>
            <textarea name="description" id="description" class="form-control" >{{ $category->description }}</textarea>
        </div> <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <button type="button" class="btn btn-success" onclick="window.location='{{ route('admin.category.index') }}';return false;">Отмена</button>
    </form>

@endsection
