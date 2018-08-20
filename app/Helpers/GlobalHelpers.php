<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GlobalHelpers
{
    public static function set_active($uri, $output = "active")
    {
        try {
            if( is_array($uri) ) {
                foreach ($uri as $u) {
                    if (\Route::is($u)) {
                        return $output;
                    }
                }
            } else {
            if (\Route::is($uri)){
                return $output;
            }
            }
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function front_set_active($uri, $output = "current")
    {
        try {
            if( is_array($uri) ) {
                foreach ($uri as $u) {
                    if (\Route::is($u)) {
                        return $output;
                    }
                }
            } else {
            if (\Route::is($uri)){
                return $output;
            }
            }
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function randomString($lenght){
        do {
        $rand = GlobalHelpers::generateRandomString($lenght);
        }
        while(!empty(User::where('id',$rand)->first()));
        return $rand;
    }

    public static function generateRandomString($length) {
       $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $charactersLength = strlen($characters);
       $randomString = '';
       for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       return $randomString;
    }
}