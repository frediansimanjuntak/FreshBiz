<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CrudHelpers
{
    public static function read_all($table)
    {
        try {
            $result = $table->paginate(10);
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    } 

    public static function read_all_by($table, $field, $key)
    {
        try {
            $result = $table->where($field, $key)->get();
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {            
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    } 

    public static function read_by($table, $field, $key)
    {
        try {
            $result = $table->where($field, $key)->first();
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    }  
    
    public static function create($table, $data)
    {
        try {
            $result = $table->create($data);
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    } 

    public static function update($table, $field, $key, $data)
    {
        try {
            $result = $table->where($field, $key)->update($data);            
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    }  

    public static function delete($table, $field, $key)
    {
        try {
            $result = $table->where($field, $key)->delete();            
            return ['success' => true, 'result' => $result];
    	}
    	catch (\Exception $e) {
            \Log::error($e->getMessage());
    		return ['success' => false, 'message' => $e->getMessage()];
    	}
    }  
}