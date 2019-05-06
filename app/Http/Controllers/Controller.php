<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Support\Facades\Auth;
use App\Category;

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
        $categories = Category::all();
        return view('index',[
            'categories' => $categories,
        ]);
    }
    
    /**
     * Switch the language.
     *
     * @return \Illuminate\Http\Response
     */
    public function locale($locale = 'uk')
    {
        if (!in_array($locale, config('app.locales'))) {
            $locale = app()->getLocale();
        }
        return redirect()->back()->cookie('locale', $locale, 120); 
    }
}
