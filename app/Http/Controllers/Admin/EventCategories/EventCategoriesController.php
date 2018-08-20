<?php

namespace App\Http\Controllers\Admin\EventCategories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventCategories;
use GlobalHelpers;
use CrudHelpers;

class EventCategoriesController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EventCategories::get();
        return view('admin.event_categories.index', ['categories'=>$categories]);
    }

    public function view_create(Request $request)
    {
        return view('admin.event_categories.form');
    }

    public function view_update(Request $request)
    {        
        $category = EventCategories::where('key', $request['category'])->first();
        return view('admin.event_categories.form', ['category'=>$category]);
    }
}
