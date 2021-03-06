<?php

namespace App\Http\Controllers\Admin\EventOrganisers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\EventOrganiser;
use App\Models\User;
use GlobalHelpers;
use CrudHelpers;
use AttachmentHelpers;

class EventOrganisersController extends Controller
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
        $event_organisers = EventOrganiser::get();
        return view('admin.event_organisers.index', ['event_organisers'=>$event_organisers]);
    }

    public function view_create(Request $request)
    {        
        $users = User::get();
        return view('admin.event_organisers.form', ['users'=>$users]);
    }

    public function view_update(Request $request)
    {        
        $organizer = EventOrganiser::where('key', $request['organizer'])->first();
        $users = User::get();
        return view('admin.event_organisers.form', ['eo'=>$organizer, 'users'=>$users]);
    }

    public function create(Request $request, EventOrganiser $event_organisers)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'company_name' => 'required',
                'description' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'website' => 'required',
                'user_key' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            
            $attachment = '';
            if ($request->file('attachment')) {
                $image = AttachmentHelpers::store('attachment', $request->file('attachment'));
                $attachment = $image;
            }
            $data['logo'] = $attachment;

            $validation_user = EventOrganiser::where('user_key', $data['user_key'])->first();
            if ($validation_user) {
                return redirect()->back()->withInput()->withErrors(['error' => "User was available"]);
            }
            else {
                $data['key'] = GlobalHelpers::randomString($event_organisers, 10);
                $result = CrudHelpers::create($event_organisers, $data);
                return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_organisers.view.list'); 
            }
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function update(Request $request, EventOrganiser $event_organisers)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'company_name' => 'required',
                'description' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'website' => 'required',
                'user_key' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $key = $data['eo_key'];
            $event_organizer_data = EventOrganiser::where('key', $key)->first();
            $attachment = $event_organizer_data->image;
            if ($request->file('attachment')) {
                $image = AttachmentHelpers::store('attachment', $request->file('attachment'));
                $attachment = $image;
            }
            $data['logo'] = $attachment;
            unset($data['_method'], $data['_token'], $data['eo_key'], $data['_wysihtml5_mode'], $data['attachment']);
            $result = CrudHelpers::update($event_organisers,'key', $key, $data);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_organisers.view.list'); 
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function delete(Request $request, EventOrganiser $event_organisers)
    {
    	try {
            $result = CrudHelpers::delete($event_organisers,'key', $request['organizer']);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.event_organisers.view.list'); 		
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    } 
}
