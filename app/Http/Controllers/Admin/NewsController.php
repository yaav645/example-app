<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        $categories = Category::all();
        return view('admin.news.index',['newslist' => $news, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();
        $news = News::all();
        return view('admin.news.create',['news' => $news, 'categories' => $categories]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string']
        ]);
        $news = News::create($request->only(['title', 'category_id', 'author', 'status', 'description']));
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }

        return back()->with('error', 'Новость не добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gitadd($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit',['news' => $news, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
    /*    $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->author = $request->input('author');
        $news->status = $request->input('status');
        $news->description = $request->input('description');*/

        $news = $news->fill($request->only(['title', 'category_id', 'author', 'status', 'description']))->save();

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }

        return back()->with('error', 'Новость не обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
