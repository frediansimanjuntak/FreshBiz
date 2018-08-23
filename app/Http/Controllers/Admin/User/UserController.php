<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use CrudHelpers;
use QsApiHelpers;
use GlobalHelpers;

class UserController extends Controller
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
        $users = User::get();
        return view('admin.user.index', ['users'=>$users]);
    }

    public function update(Request $request, User $user)
    {
    	try {
            $data = $request->all();
            if (Auth::guard('admin')->user()->id == $data['id']) {                
			    return redirect()->back()->withInput()->withErrors(['error' => 'You can not disabled yourself']);
            }
            unset($data['_method'], $data['_token']);
            $result = CrudHelpers::update($user,'id', $data['id'], $data);
            // dd($result);
            return $result['success']==false ? redirect()->back()->withInput()->withErrors(['error' => $result['message']]) : redirect()->route('admin.user.view.list'); 
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

    public function create(Request $request, User $user)
    {
    	try {
            $data['email'] = $data['reg_email'];
            $validator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'reg_email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $is_register = QsApiHelpers::register($data); 
            if ($is_register->success == 1) {
                $user_data = User::create([
                    'name' => $data['first_name'].' '.$data['last_name'],
                    'email' => $data['reg_email'],
                    'key' => GlobalHelpers::randomString($user, 10)
                ]);
                return redirect()->route('admin.user.view.list');
            }
            else if ($is_register->success == 0){
                return redirect()->back()->withInput()->withErrors(['register_error' => $is_register->message]);
            }    
            else {
                return redirect()->back()->withInput()->withErrors(['register_error' => 'System Error, Please Contact Admin']);
            }   
    	}
    	catch (\Exception $e) {
			return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    	}    	
    }

}
