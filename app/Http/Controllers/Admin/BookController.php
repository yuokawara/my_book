<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Book modelを使用
use App\Book;

class BookController extends Controller
{
    public function add()
    {
        return view('admin.book.create');
    }
    public function create(Request $request)
    {
        //追記
        $this->validate($request, Book::$rules);

        $book = new Book;
        $form = $request->all();

        //フォームから画像送信後保存、$book->image_pathに画像を保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $book->image_path = basename($path);
        }

        //フォームから送信の_token削除
        unset($form['_token']);
        //同じくimage削除
        unset($form['image']);

        // データベースに保存
        $book->fill($form);
        $book->save();

        // admin/news/createにリダイレクトする
        return redirect('admin/book/create');
    }
}
