<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AttachmentHelpers
{
    public static function store($location, $file)
    {
        try {
            $path = Storage::disk('public')->put($location, $file, 'public');
            return $path;
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }

    public static function delete($file)
    {
        try {
            Storage::delete($file);
            return 'success';
    	}
    	catch (\Exception $e) {
    		return $e->getMessage();
    	}
    }
}