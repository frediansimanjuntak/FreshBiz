<?php

namespace App\Http\Controllers\Admin\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventCategories;
use App\Models\EventOrganiser;
use GlobalHelpers;
use CrudHelpers;

class EventController extends Controller
{
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
        $events = Events::get();
        return view('admin.event.index', ['events'=>$events]);
    }

    public function view_create(Request $request)
    {        
        $event_categories = EventCategories::get();
        $event_organisers = EventOrganiser::get();
        return view('admin.event.form', ['event_categories'=>$event_categories, 'event_organisers'=>$event_organisers]);
    }

    public function view_update(Request $request)
    {        
        $event = Events::where('key', $request['event'])->first();
        $event_categories = EventCategories::get();
        $event_organisers = EventOrganiser::get();
        return view('admin.event.form', ['event'=>$event, 'event_categories'=>$event_categories, 'event_organisers'=>$event_organisers]);
    }

    public function create(Request $request, Events $event)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'title' => 'required',
                'description' => 'required',
                'date_start' => 'required',
                'date_end' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
                'location' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $data['key'] = GlobalHelpers::randomString($event, 10);
            $result = CrudHelpers::create($event, $data);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event.view.list'); 
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function update(Request $request, Events $event)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'title' => 'required',
                'description' => 'required',
                'date_start' => 'required',
                'date_end' => 'required',
                'time_start' => 'required',
                'time_end' => 'required',
                'location' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $key = $data['event_key'];
            unset($data['_method'], $data['_token'], $data['event_key']);
            $result = CrudHelpers::update($event,'key', $key, $data);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event.view.list'); 
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function delete(Request $request, Events $event)
    {
    	try {
            $result = CrudHelpers::delete($event,'key', $request['organizer']);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event.view.list'); 		
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    } 
}