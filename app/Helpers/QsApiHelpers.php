<?php

namespace App\Helpers;

class QsApiHelpers
{
    private static $apiUrl = 'https://api.quarkspark.com/';

    public static function connectAPI($body, $request, $url)
    {
        try {            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $request,
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "content-type: multipart/form-data",
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
                return "cURL Error #:" . $err;
            } else {
                return (json_decode($response));
            }
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function register($body)
    {
        try {
            $data1 = [
                'email' => $body['email'],
                'password1' => $body['password'],
                'password2' => $body['password_confirmation'],
                'first_name' => $body['first_name'],
                'last_name' => $body['last_name'],
                'terms' => "true"
            ];

            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'user/register');
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function login($body)
    {
        try {
            $data1 = [
                'email' => $body['email'],
                'password' => $body['password'],
                'application_key' => env('APPLICATION_KEY_API_QS')
            ];
            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'session/auth');
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function detail_user($body)
    {
        try {
            $data1 = [
                'uuid' => $body['user_id'],
                'session_key' => $body['session_key'],
                'application_key' => env('APPLICATION_KEY_API_QS')
            ];

            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'session/details');
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function chk_session($body)
    {
        try {
            $data1 = [
                'user_email' => $body['email'],
                'session_key' => $body['session_key'],
                'application_key' => env('APPLICATION_KEY_API_QS')
            ];

            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'session/check');
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function rnew_session($body)
    {
        try {
            $data1 = [
                'uuid' => $body['uuid'],
                'session_key' => $body['session_key'],
                'application_key' => env('APPLICATION_KEY_API_QS')
            ];

            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'session/renew');
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function detail_another_user($body, $user_id)
    {
        try {
            $data1 = [
                'user_email' => $body['email'],
                'session_key' => $body['session_key'],
                'application_key' =>env('APPLICATION_KEY_API_QS')
            ];

            $callApi = QsApiHelpers::connectAPI($data1, 'POST', self::$apiUrl.'user/retrieve/'.$user_id);
            return $callApi;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function get_profile_img($user_id)
    {
        try {
            $img = get_headers('https://account.quarkspark.com/user/image?type=profile&uuid='.$user_id, true);
            if ($img['Content-Type'] == "image/jpg") {
                return true;
            }
            else {
                return false;
            }
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }
}