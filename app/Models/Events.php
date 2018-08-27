<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primaryKey = 'key';
    public $incrementing = false;
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'key', 'title', 'description', 'date_start', 'date_end', 'time_start', 'time_end', 'location', 'tags', 'image', 'private', 'disabled', 'eo_key', 'event_category_key'
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

    public function event_organizer()
    {
        return $this->belongsTo('App\Models\EventOrganiser', 'eo_key');
    }

    public function event_category()
    {
        return $this->belongsTo('App\Models\EventCategories', 'event_category_key');
    }
}
