<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Service;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * Display a main page content
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',[
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
        return view('show',[
            'category' => Category::find($id),
        ]);
    }
    
    /**
     * Switch the language.
     *
     * @return \Illuminate\Http\Response
     */
    public function locale(Request $request)
    {
        $locale = $request->input('locale', 'uk');
        if (!in_array($locale, config('app.locales'))) {
            $locale = app()->getLocale();
        }
        return redirect()->back()->cookie('locale', $locale, 120); 
    }
}
