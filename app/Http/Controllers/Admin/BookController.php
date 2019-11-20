<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function add()
    {
        return view('admin.book.create');
    }
    public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
        return redirect('admin/book/create');
    }
}
