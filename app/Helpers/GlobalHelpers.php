<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}