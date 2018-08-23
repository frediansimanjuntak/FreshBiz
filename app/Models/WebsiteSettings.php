<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    //
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'name', 'logo_light', 'logo_small_light', 'logo_dark', 'logo_small_dark', 'meta'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public $timestamps = true;
    protected $dates = [
        'created_at', 'updated_at', 
    ];
}
