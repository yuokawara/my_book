@extends('layouts.admin')
@section('title', 'Book新規登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Book新規作成</h2>
            <form action="{{ action('Admin\BookController@create') }}" method="post" enctype="multipart/form-data">



                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">読んだ感想</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="page1">重要ページ①</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" name="page1" value="{{ old('page1') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="word1">重要な一文①</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="word1" value="{{ old('word1') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="important">最重要</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="important" value="{{ old('important') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="plan">計画</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="plan" value="{{ old('plan') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="action">行動する事</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="action" value="{{ old('action') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="title">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection
