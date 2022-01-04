<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        return view('news.index', ['newslist' => $this->getNews()]);
    }

    public function show(int $id)
    {
        $new = $this->getNews();
        $new[$id]['id'] ?? abort(404);
        return view('news.show', ['new' => $new, 'id' => $id]);

    }
}
