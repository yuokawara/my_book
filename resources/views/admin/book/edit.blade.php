@extends('layouts.admin')
@section('title', 'Book編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Book編集</h2>
            <form action="{{ action('Admin\BookController@update') }}" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="title" value="{{ $book_form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">読んだ感想</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="5">{{ $book_form->body }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="page1">重要ページ①</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="page1" value="{{ $book_form->page1 }}">
                    </div>
                    <label class="col-md-2" for="word1">重要文①</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="word1" value="{{ $book_form->word1 }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="page2">重要ページ②</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="page2" value="{{ $book_form->page2 }}">
                    </div>
                    <label class="col-md-2" for="word2">重要文②</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="word2" value="{{ $book_form->word2 }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="page1">重要ページ③</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="page3" value="{{ $book_form->page3 }}">
                    </div>
                    <label class="col-md-2" for="word3">重要文③</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="word3" value="{{ $book_form->word3 }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="important">最重要</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="important" value="{{ $book_form->important }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="plan">計画</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="plan" value="{{ $book_form->plan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="action">行動する事</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="action" value="{{ $book_form->action }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                            設定中: {{ $book_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $book_form->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
            {{-- 以下を追記 --}}
            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                        @if ($book_form->bookhistories != NULL)
                        @foreach ($book_form->bookhistories as $bookhistory)
                        <li class="list-group-item">{{ $bookhistory->edited_at }}</li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
