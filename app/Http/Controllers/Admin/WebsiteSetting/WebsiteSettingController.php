<?php

namespace App\Http\Controllers\Admin\WebsiteSetting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use CrudHelpers;

class WebsiteSettingController extends Controller
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
        $website_setting = WebsiteSettings::first();
        return view('admin.website_setting.form', ['website_setting'=>$website_setting]);
    }

    public function view_update(Request $request)
    {        
        $website_setting = WebsiteSettings::first();
        return view('admin.website_setting.form', ['website_setting'=>$website_setting]);
    }

    public function update(Request $request, WebsiteSettings $website_setting)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required',
                'logo_light' => 'required',
                'logo_small_light' => 'required',
                'logo_dark' => 'required',
                'logo_small_dark' => 'required',
                'meta' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $web_setting = WebsiteSettings::first();
            // dd($data);
            if($web_setting){                
                $id = $web_setting->id;
                unset($data['_method'], $data['_token']);
                $result = CrudHelpers::update($website_setting,'id', $id, $data);
            }
            else {                
                $result = CrudHelpers::create($website_setting, $data);
            }

            if ($result['success']==false) {
                return redirect()->back()->withInput()->withErrors(['error' => $result['message']]);
            }
            else {                
                $web_setting = WebsiteSettings::first();
                config(['website.setting.name' => $web_setting->name, 'website.setting.logo_light' => $web_setting->logo_light, 'website.setting.logo_small_light' => $web_setting->logo_small_light, 'website.setting.logo_dark' => $web_setting->logo_dark, 'website.setting.logo_small_dark' => $web_setting->logo_small_dark, 'website.setting.meta_description' => $web_setting->meta]);
                return redirect()->route('admin.setting.website.view.update');
            }
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

}
