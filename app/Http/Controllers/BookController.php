<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// 追記
use App\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        // $cond_title が空白でない場合は、記事を検索して取得する
        if ($cond_title != '') {
            $posts = Book::where('title', $cond_title)->get();
        } else {
            $posts = Book::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        // ページネイト用
        $posts = Book::paginate(5);

        //View テンプレートに headline、 posts、 cond_title という変数を渡している
        return view('book.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
    }
}
