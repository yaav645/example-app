<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class NewsController extends Controller
{
    //
    public function index()
    {

        $news = News::all();
        return view('news.index',['newslist' => $news]);

    }

    public function show(News $news)
    {

        return view('news.show', ['news' => $news]);

    }
}
