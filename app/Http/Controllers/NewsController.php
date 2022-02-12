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

        $news = New News();
        return view('news.index',['newslist' => $news->getNews()]);

    }

    public function show(int $id)
    {
        $news = New News();
        $news = $news->getNewsByID($id);
        return view('news.show', ['news' => $news]);

    }
}
