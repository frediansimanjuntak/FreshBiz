<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GlobalHelpers;
use CrudHelpers;
use QsApiHelpers;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {        
        // dd($request);
        $is_login = QsApiHelpers::login($request);
        if ($is_login->success == 1) {
            $usr['session_key'] = $is_login->session_key;
            $usr['user_id'] = $is_login->user_id;
            $detail_user = QsApiHelpers::detail_user($usr);
            // dd($detail_user);   
            if ($detail_user->success == 1) {
                $user = User::where('email', request('email'))->first();                
                if (!$user) {     
                    $user = new User;  
                    $user->key = GlobalHelpers::randomString(10);
                    $user->qs_user_id = $is_login->user_id;
                }     
                $user->photo_url = QsApiHelpers::get_profile_img($is_login->user_id);
                $user->name = $detail_user->first_name.' '.$detail_user->last_name;
                $user->email = $detail_user->email;                    
                $user->phone = $detail_user->phone_number ? $detail_user->phone_number : 0;   
                $user->qs_session_key = $is_login->session_key;
                // dd($user);
                $user->save();
                
                if ($user->disabled == true) {
                    return redirect()->back()->withErrors(['error' => 'Please contact admin about your account.']);
                }
                else {
                    Auth::login($user);
                    return redirect()->route('front.home');
                }
            }
            else {
                return redirect()->back()->withInput()->withErrors(['error' => $detail_user->message]);
            }
        } 
        else if ($is_login->success == 0){
            return redirect()->back()->withInput()->withErrors(['error' => $is_login->message]);
        }           
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'System Error, Please Contact Admin']);
        }
    }    

    public function logout(Request $request)
    {        
        Session::flush();
        Auth::logout();
        return redirect('login');
    } 
}
