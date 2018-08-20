<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    //
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'key', 'name', 'description', 'disabled'
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
