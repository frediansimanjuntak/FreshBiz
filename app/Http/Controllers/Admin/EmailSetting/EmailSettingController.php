<?php

namespace App\Http\Controllers\Admin\EmailSetting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\EmailSettings;
use CrudHelpers;

class EmailSettingController extends Controller
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
        $email_setting = EmailSettings::first();
        return view('admin.email_setting.form', ['email_setting'=>$email_setting]);
    }

    public function view_update(Request $request)
    {        
        $email_setting = EmailSettings::first();
        return view('admin.email_setting.form', ['email_setting'=>$email_setting]);
    }

    public function update(Request $request, EmailSettings $email_setting)
    {
    	try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'from_name' => 'required',
                'from_email' => 'required',
                'feedback_email_to' => 'required',
                'mandrill_key' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $mail_setting = EmailSettings::first();
            if($mail_setting){                
                $id = $mail_setting->id;
                unset($data['_method'], $data['_token']);
                $result = CrudHelpers::update($email_setting,'id', $id, $data);
            }
            else {                
                $result = CrudHelpers::create($email_setting, $data);
            }
            if ($result['success']==false) {
                return redirect()->back()->withInput()->withErrors(['error' => $result['message']]);
            }
            else {                
                $mail_setting = EmailSettings::first();
                config(['services.mandrill.secret' => $mail_setting->mandrill_key, 'mail.from.address' => $mail_setting->from_email, 'mail.from.name' => $mail_setting->from_name, 'mail.feedback_to.address' => $mail_setting->feedback_email_to]);
                return redirect()->route('admin.setting.email.view.update');
            }
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }
}
