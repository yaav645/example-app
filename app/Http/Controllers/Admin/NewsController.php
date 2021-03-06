<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\EditNewsRequest;
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
        $news = News::with('category')->paginate(10);

       /* $news = News::join('categories', 'news.category_id', "=", 'categories.id')
                ->select('news.*', 'categories.title as categoryTitle')
                ->paginate(10);*/

        return view('admin.news.index',['newslist' => $news]);
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
    public function store(CreateNewsRequest $request)
    {

        //$news = News::create($request->only(['title', 'category_id', 'author', 'status', 'description']));
        $news = News::create($request->validated());

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.store.success'));
        }

        return back()->with('error', trans('messages.admin.news.store.fail'));
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
    public function update(EditNewsRequest $request, News $news)
    {
    /*    $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->author = $request->input('author');
        $news->status = $request->input('status');
        $news->description = $request->input('description');*/

        $news = $news->fill($request->validated())->save();
        //$news = $news->fill($request->validated())->save();

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }

        return back()->with('error', trans('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {

        try {
            $news->delete();
            return response()->json(['success' => true]);
        }catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
            return response()->json(['success' => false]);
        }
    }
}
