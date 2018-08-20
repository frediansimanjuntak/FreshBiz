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

    public function login(Request $request, User $user)
    {        
        // dd($request);
        $is_login = QsApiHelpers::login($request);
        if ($is_login->success == 1) {
            $usr['session_key'] = $is_login->session_key;
            $usr['user_id'] = $is_login->user_id;
            $detail_user = QsApiHelpers::detail_user($usr);
            // dd($detail_user);   
            if ($detail_user->success == 1) {
                $user_data = User::where('email', request('email'))->first();                
                if (!$user_data) {     
                    $user_data = new User;  
                    $user_data->key = GlobalHelpers::randomString($user, 10);
                    $user_data->qs_user_id = $is_login->user_id;
                }     
                $user_data->photo_url = QsApiHelpers::get_profile_img($is_login->user_id);
                $user_data->name = $detail_user->first_name.' '.$detail_user->last_name;
                $user_data->email = $detail_user->email;                    
                $user_data->phone = $detail_user->phone_number ? $detail_user->phone_number : 0;   
                $user_data->qs_session_key = $is_login->session_key;
                // dd($user);
                $user_data->save();
                
                if ($user_data->disabled == true) {
                    return redirect()->back()->withErrors(['login_error' => 'Please contact admin about your account.']);
                }
                else {
                    Auth::login($user_data);
                    return redirect()->intended(route('front.home'));
                }
            }
            else {
                return redirect()->back()->withInput()->withErrors(['login_error' => $detail_user->message]);
            }
        } 
        else if ($is_login->success == 0){
            return redirect()->back()->withInput()->withErrors(['login_error' => $is_login->message]);
        }           
        else {
            return redirect()->back()->withInput()->withErrors(['login_error' => 'System Error, Please Contact Admin']);
        }
    }    

    public function logout(Request $request)
    {        
        Session::flush();
        Auth::logout();
        return redirect('login');
    } 
}
