<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::all(),
        ]);
    }
    
    /**
     * Display the specified category.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category.show',[
            'category' => Category::find($id),
        ]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create',[
            'category' => new Category(),
        ]);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \App\Http\Requests\CreateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $category = new Category();
        foreach(config('app.locales') as $locale) {
            $category->{'name_'.$locale} = $request->{'name_'.$locale};
        }
        $category->image = $request->image;
        $category->options = $request->options;
        $category->save();
        return redirect(route('category.show',['id' => $category->id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit',[
            'category' => Category::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\UpdateCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $category = Category::find($id);
        foreach(config('app.locales') as $locale) {
            $category->{'name_'.$locale} = $request->{'name_'.$locale};
        }
        $category->image = $request->image;
        $category->options = $request->options;
        $category->save();
        return redirect(route('category.show',['id' => $category->id]));
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('category');
    }
}
