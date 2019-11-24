@extends('layouts.admin')
@section('title', 'Book一覧')

@section('content')
<div class="container">
    <div class="row">
        <h2>読書済Book</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\BookController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8">
            <form action="{{ action('Admin\BookController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="10%">本のタイトル</th>
                            <th width="10%">感想<br>（簡潔に）</th>
                            <th width="10%">ページ①<br>ワード</th>
                            <th width="10%">ページ②<br>ワード</th>
                            <th width="10%">ページ③<br>ワード</th>
                            <th width="10%">最重要</th>
                            <th width="10%">あなたの計画</th>
                            <th width="10%">今すぐ行動！</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $book)
                        <tr>
                            <th>{{ $book->id }}</th>
                            <td>{{ Str::limit($book->title, 100) }}</td>
                            <td>{{ Str::limit($book->body, 140) }}</td>
                            <td>{{ $book->page1 }}<br>{{ Str::limit($book->word1, 100) }}</td>
                            <td>{{ $book->page2 }}<br>{{ Str::limit($book->word2, 100) }}</td>
                            <td>{{ $book->page3 }}<br>{{ Str::limit($book->word3, 100) }}</td>
                            <td>{{ Str::limit($book->important, 140) }}</td>
                            <td>{{ Str::limit($book->plan, 100) }}</td>
                            <td>{{ Str::limit($book->action, 100) }}</td>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\BookController@edit', ['id' => $book->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\BookController@delete', ['id' => $book->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
