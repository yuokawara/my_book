<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\BookHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\New_;

class BookController extends Controller
{
    public function add()
    {
        return view('admin.book.create');
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Book::$rules);
        $book = new Book;
        $form = $request->all();

        // formに画像があれば、保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $book->image_path = basename($path);
        } else {
            $book->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);
        // データベースに保存する
        $book->fill($form);
        $book->save();

        return redirect('admin/book/create');
    }

    // 以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Book::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Book::all();
        }
        return view('admin.book.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        $book = Book::find($request->id);
        if (empty($book)) {
            abort(404);
        }

        return view('admin.book.edit', ['book_form' => $book]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Book::$rules);
        $book = Book::find($request->input('id'));
        $book_form = $request->all();
        if ($request->input('remove')) {
            $book_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $book_form['image_path'] = basename($path);
        } else {
            $book_form['image_path'] = $book->image_path;
        }

        unset($book_form['_token']);
        unset($book_form['image']);
        unset($book_form['remove']);
        $book->fill($book_form)->save();

        // 追記
        $bookhistory = new BookHistory;
        $bookhistory->book_id = $book->id;
        $bookhistory->edited_at = Carbon::now();
        $bookhistory->save();

        return redirect('admin/book/');
    }

    public function delete(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();
        return redirect('admin/book');
    }

}
