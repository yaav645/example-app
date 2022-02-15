<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('news')->paginate(10);
        return view('admin.Categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Categories.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if($category) {
            return redirect()->route('admin.category.index')
                ->with('success', trans('messages.admin.category.store.success'));
        }

        return back()->with('error', trans('messages.admin.category.store.fail'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.Categories.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {

    //    $category->title = $request->input('title');
    //   $category->description = $request->input('description');
    //    $category = $category->fill($request->only(['title', 'description']))->save();
        $category = $category->fill($request->validated());

        if($category->save()) {
            return redirect()->route('admin.category.index')
                ->with('success', trans('messages.admin.category.update.success'));
        }

        return back()->with('error', trans('messages.admin.category.update.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('categories.show', ['category' => $category]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(['success' => true]);
        }catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
            return response()->json(['success' => false]);
        }
    }
}
