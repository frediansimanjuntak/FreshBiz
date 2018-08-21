<?php

namespace App\Http\Controllers\Admin\EventCategories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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

    public function create(Request $request, EventCategories $event_categories)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required',
                'description' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $data['key'] = GlobalHelpers::randomString($event_categories, 10);
            $result = CrudHelpers::create($event_categories, $data);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_categories.view.list'); 
    	}
    	catch (\Exception $e) {
            dd($e->getMessage());
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function update(Request $request, EventCategories $event_categories)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required',
                'description' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $key = $data['category'];
            unset($data['_method'], $data['_token'], $data['category']);
            $result = CrudHelpers::update($event_categories,'key', $key, $data);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_categories.view.list'); 
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function delete(Request $request, EventCategories $event_categories)
    {
    	try {
            $result = CrudHelpers::delete($event_categories,'key', $request['category']);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_categories.view.list'); 		
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    } 
}
